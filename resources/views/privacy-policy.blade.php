@extends('layouts.guest')



@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">Privacy Policy for Our {{ config('app.name', 'TaskMastery') }} Platform</h1>
    <p class="mb-6">
        Your privacy is of utmost importance to us. This Privacy Policy explains how we collect, use, and protect your information
        while providing our {{ config('app.name', 'TaskMastery') }} services.
    </p>

    <h2 class="text-xl font-semibold mb-4">What Information Do We Collect?</h2>
    <p class="mb-6">
        To provide seamless {{ config('app.name', 'TaskMastery') }} services, we collect the following data:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li><strong>Personal Data:</strong> Name, email, and password for account creation.</li>
        <li><strong>Task Details:</strong> Task titles, descriptions, deadlines, and attached files.</li>
        <li><strong>Usage Analytics:</strong> Interactions with the platform for improving user experience.</li>
        <li><strong>Cookies:</strong> Small files that store user preferences for a personalized experience.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">How Do We Use Your Information?</h2>
    <p class="mb-6">
        The data we collect is used for the following purposes:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li>Facilitating task creation, editing, and management functionalities.</li>
        <li>Sending task reminders and notifications to help you stay on track.</li>
        <li>Improving our platform based on user feedback and analytics.</li>
        <li>Ensuring the security of your account and task data.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">How Do We Protect Your Information?</h2>
    <p class="mb-6">
        We implement robust security measures to safeguard your data:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li>End-to-end encryption for sensitive information, such as passwords and task details.</li>
        <li>Regular security updates and vulnerability scans.</li>
        <li>Data backups to prevent loss of information.</li>
        <li>Strict access controls to ensure only authorized personnel can access your data.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">Your Rights</h2>
    <p class="mb-6">
        You have full control over your data, including:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li>Requesting a copy of your personal and task data.</li>
        <li>Updating inaccurate or incomplete information.</li>
        <li>Deleting your account and data upon request, subject to applicable legal requirements.</li>
        <li>Managing notification preferences and opting out of promotional emails.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">Cookies and Tracking Technologies</h2>
    <p class="mb-6">
        We use cookies to improve your experience. These cookies:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li>Remember your login session for faster access.</li>
        <li>Store task-related preferences for a customized experience.</li>
        <li>Analyze platform usage to optimize performance.</li>
    </ul>
    <p class="mb-6">
        You can manage cookies via your browser settings. Note that disabling cookies may limit platform functionality.
    </p>

    <h2 class="text-xl font-semibold mb-4">Third-Party Services</h2>
    <p class="mb-6">
        To enhance our services, we may share your data with trusted third-party providers, such as:
    </p>
    <ul class="list-disc pl-6 mb-6">
        <li>Cloud storage providers for secure file hosting.</li>
        <li>Email service providers for sending task reminders and updates.</li>
    </ul>

    <h2 class="text-xl font-semibold mb-4">Updates to This Privacy Policy</h2>
    <p class="mb-6">
        We may update this Privacy Policy to reflect changes in our practices or legal requirements. Please check this page periodically for updates.
        Your continued use of our platform constitutes acceptance of any changes.
    </p>

    <h2 class="text-xl font-semibold mb-4">Contact Us</h2>
    <p>
        For questions or concerns about this Privacy Policy, reach out to us at
        <a href="mailto:support@example.com" class="text-blue-600 hover:underline">support@example.com</a>.
    </p>
@endsection
