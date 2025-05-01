# Wuzzuf - Job Portal Platform

A comprehensive job portal platform built with Laravel that connects job seekers with employers. The platform provides a seamless experience for both job seekers and employers to find and post job opportunities.

## Features

### 🔐 User Authentication & Authorization
- Secure user registration and login system
- Role-based access control (Employer, Employee, Guest)
- Profile management with CV and avatar uploads

### 👥 User Profiles
- Customizable user profiles
- CV upload and management
- Professional summary and headline
- Avatar customization

### 💼 Job Management
- Job posting system for employers
- Detailed job listings with:
  - Job description
  - Responsibilities
  - Qualifications
  - Benefits
  - Location
  - Job type
  - Experience level
  - Gender requirements
  - Category classification

### 📝 Application System
- Job application process
- Cover letter submission
- CV upload during application
- Application tracking
- Multiple application stages (screening, etc.)

### 💬 Real-time Communication
- Integrated chat system for employer-candidate communication
- Pusher integration for real-time messaging
- Chat available in later hiring stages Doesn't Work at (Screening, Declined) But on (Shortlisted / Interview / Accepted) 
- Chatting Access is strictly controlled by job offer ownership and application status
- All unauthorized access attempts are properly handled, Only authorized users can access chats
- The system maintains proper separation between different job offers and users
- Previous conversations are preserved for authorized users

### 🔍 Job Search & Filtering
- Browse all available jobs
- Location-based filtering
- Company-based filtering
- Category-based organization

## Technical Stack
- Laravel Framework
- MySQL Database
- Pusher for real-time features
- File storage for CVs and avatars
- Role-based middleware for access control

## Getting Started

1. Clone the repository
2. Install dependencies: `composer install`
3. Set up your environment variables
4. Run migrations: `php artisan migrate`
5. Start the development server: `php artisan serve`

## Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

## License
This project is licensed under the MIT License.
