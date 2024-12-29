<?php
// {{ config('app.name', 'TaskMastery') }}
return [
    'home' => [
        'title' => 'TaskMastery | Simplify Your Task Management Effortlessly',
        'description' => 'Discover TaskMastery, the ultimate task management solution to stay organized, boost productivity, and achieve your goals with ease. Sign up today!',
        'keywords' => 'task management, organize tasks, productivity tools, task planner, TaskMastery',
        'og_image' => '/images/TaskMastery-home-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'TaskMastery',
            'url' => url('/'),
            'description' => 'Discover TaskMastery, the ultimate task management solution to stay organized.'
        ]
    ],
    'privacy-policy' => [
        'title' => 'Privacy Policy | Your Data Security Matters at TaskMastery',
        'description' => 'At TaskMastery, we prioritize your data privacy. Learn about our policies for data collection, storage, and protection to ensure your trust.',
        'keywords' => 'privacy policy, data protection, secure platform, TaskMastery privacy, user data security',
        'og_image' => '/images/TaskMastery-privacy-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Privacy Policy',
            'url' => route('privacy-policy'),
            'description' => 'Learn about TaskMastery’s privacy policy and how we protect your data.'
        ]
    ],
    'login' => [
        'title' => 'Login | Access Your TaskMastery Dashboard Anytime',
        'description' => 'Log in to TaskMastery to manage your tasks, track progress, and stay on top of your productivity goals. Secure and hassle-free access!',
        'keywords' => 'TaskMastery login, secure login, task management login, dashboard access, user account',
        'og_image' => '/images/TaskMastery-login-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Login',
            'url' => route('login'),
            'description' => 'Log in to your TaskMastery account to manage tasks and track your progress.'
        ]
    ],
    'register' => [
        'title' => 'Register | Join TaskMastery and Simplify Your Life',
        'description' => 'Create your free TaskMastery account and experience seamless task management. Start organizing and achieving more today!',
        'keywords' => 'register on TaskMastery, create account, task management signup, task tracker registration, TaskMastery join',
        'og_image' => '/images/TaskMastery-register-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Register',
            'url' => route('register'),
            'description' => 'Create a TaskMastery account to start organizing your tasks and boosting productivity.'
        ]
    ],
    'about-us' => [
        'title' => 'About Us | Learn More About TaskMastery',
        'description' => 'Discover the story behind TaskMastery and our mission to make task management simple and efficient for everyone.',
        'keywords' => 'about TaskMastery, task management solutions, company mission, productivity tools, about us',
        'og_image' => '/images/TaskMastery-about-us-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => 'About Us',
            'url' => route('about-us'),
            'description' => 'Learn about the mission and vision of TaskMastery, your trusted task management platform.'
        ]
    ],

    'contact-us' => [
        'title' => 'Contact Us | Get in Touch with TaskMastery',
        'description' => 'Have questions or need support? Contact TaskMastery today and let us help you with your task management needs.',
        'keywords' => 'contact TaskMastery, task management support, get in touch, customer service, help desk',
        'og_image' => '/images/TaskMastery-contact-us-og.jpg',
        'schema' => [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Contact Us',
            'url' => route('contact-us'),
            'description' => 'Reach out to TaskMastery for inquiries, support, or feedback.'
        ]
    ],


];
