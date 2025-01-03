<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Request::url() === url('/'))
    <link rel="canonical" href="{{ url('/') }}">
    @endif

    <title>{{ config('app.name', 'TaskMastery') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/figtree.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #chatbox {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 10px;
            width: 90%;
            max-width: 400px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 9999;
        }

        #chatbox.dark {
            background-color: #1a202c;
            color: #ffffff;
        }

        #chatbox-header {
            background-color: #4a90e2;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 10px 10px 0 0;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chatbox-header button {
            background: none;
            border: none;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
        }

        #chatMessages {
            padding: 10px;
            height: 300px;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        #chatMessages.dark {
            border-bottom: 1px solid #2d3748;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-message strong {
            font-weight: bold;
        }

        .chat-message.user {
            color: #2b6cb0;
        }

        .chat-message.ai {
            color: #2f855a;
        }

        #chatInputContainer {
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #chatInput {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            min-width: 0;
        }

        #chatInput.dark {
            border: 1px solid #2d3748;
            background-color: #2d3748;
            color: #ffffff;
        }

        #sendChat {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 8px 10px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        #sendChat:hover {
            background-color: #357ab8;
        }

        #toggleChat {
            position: fixed;
            bottom: 20px;
            right: 10px;
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 8px 15px;
            border-radius: 50px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            cursor: pointer;
            z-index: 9999;
        }

        #toggleChat:hover {
            background-color: #357ab8;
        }

        #chatbox-loader {
            display: none;
            margin: 10px auto;
            text-align: center;
        }

        #chatbox-loader span {
            display: inline-block;
            width: 8px;
            height: 8px;
            margin: 0 3px;
            background-color: #4a90e2;
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        #chatbox-loader span:nth-child(1) {
            animation-delay: -0.32s;
        }

        #chatbox-loader span:nth-child(2) {
            animation-delay: -0.16s;
        }

        #chatbox-loader span:nth-child(3) {
            animation-delay: 0s;
        }

        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
            }

            40% {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            #chatbox {
                bottom: 10px;
                width: 95%;
                right: 2.5%;
            }

            #chatMessages {
                height: 250px;
            }

            #toggleChat {
                bottom: 15px;
                right: 10px;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Chatbox -->
    <div id="chatbox">
        <div id="chatbox-header">
            AI Chat
            <button id="closeChat">✖</button>
        </div>
        <div id="chatMessages" class="dark">
            <!-- Messages will appear here -->
        </div>
        <div id="chatbox-loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div id="chatInputContainer">
            <input id="chatInput" type="text" placeholder="Type your message..." class="dark">
            <button id="sendChat">Send</button>
        </div>
    </div>

    <!-- Toggle Chat Button -->
    <button id="toggleChat">Chat with AI</button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatbox = document.getElementById('chatbox');
            const chatMessages = document.getElementById('chatMessages');
            const chatInput = document.getElementById('chatInput');
            const sendChat = document.getElementById('sendChat');
            const toggleChat = document.getElementById('toggleChat');
            const closeChat = document.getElementById('closeChat');
            const loader = document.getElementById('chatbox-loader');

            // Toggle Chatbox Visibility
            toggleChat.addEventListener('click', () => {
                chatbox.style.display = chatbox.style.display === 'block' ? 'none' : 'block';
            });

            closeChat.addEventListener('click', () => {
                chatbox.style.display = 'none';
            });

            async function sendMessage() {
                const userMessage = chatInput.value.trim();
                if (!userMessage) return;

                // Add user message to chat
                appendMessage('user', userMessage);

                chatInput.value = '';

                // Show loader
                loader.style.display = 'block';

                try {
                    const response = await fetch('{{ route('generate-content') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ text: userMessage }),
                    });

                    const result = await response.json();

                    if (result.success) {
                        appendMessage('ai', result.data.candidates[0].content.parts[0].text);
                    } else {
                        appendMessage('system', 'Failed to get response from AI.');
                    }
                } catch (error) {
                    appendMessage('system', 'An error occurred. Please try again.');
                } finally {
                    // Hide loader
                    loader.style.display = 'none';
                }
            }

            sendChat.addEventListener('click', async () => sendMessage());

            chatInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    sendMessage();
                }
            });

            function appendMessage(sender, message) {
                const msgClass = sender === 'user' ? 'user' : sender === 'ai' ? 'ai' : 'system';
                const messageElement = document.createElement('div');
                messageElement.className = `chat-message ${msgClass}`;
                messageElement.innerHTML = `<strong>${sender.toUpperCase()}:</strong> ${message}`;
                chatMessages.appendChild(messageElement);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });
    </script>
</body>

</html>
