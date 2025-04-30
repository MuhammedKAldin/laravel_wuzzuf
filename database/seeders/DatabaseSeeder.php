<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\JobOffer;
use App\Models\JobOfferUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Microsoft',
            'email' => 'recruitment@microsoft.com',
            'phonenumber' => '0900',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Information / Technology',
            'summary' => 'Microsoft is cool place to work at',
        ]);

        User::factory()->create([
            'name' => 'Google',
            'email' => 'careers@google.com',
            'phonenumber' => '0901',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Technology / Search Engine',
            'summary' => 'Google is a global technology leader focused on improving the way people connect with information.',
        ]);

        User::factory()->create([
            'name' => 'Amazon',
            'email' => 'jobs@amazon.com',
            'phonenumber' => '0902',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'E-commerce / Technology',
            'summary' => 'Amazon is Earth\'s most customer-centric company, working to build a better future for everyone.',
        ]);

        User::factory()->create([
            'name' => 'Valeo',
            'email' => 'careers@valeo.com',
            'phonenumber' => '0903',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Automotive / Technology',
            'summary' => 'Valeo is a global automotive supplier, partner to all carmakers and new mobility actors.',
        ]);

        User::factory()->create([
            'name' => 'IBM',
            'email' => 'recruitment@ibm.com',
            'phonenumber' => '0904',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Technology / Consulting',
            'summary' => 'IBM is a leading cloud platform and cognitive solutions company.',
        ]);

        User::factory()->create([
            'name' => 'Mohamed Kamal Aldin',
            'email' => 'test@example.com',
            'phonenumber' => '01095304064',
            'role' => 'employee',
            'password' => '3244039',
            'headline' => 'Java Developer',
            'summary' => 'Experienced Developer with 3 years of experience',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Software Developer',
            'description' => 'we need someone cool',
            'responsibility' => 'able to build cool stuff',
            'qualifications' => 'has cool background',
            'benifits' => 'will be given pizza',
            'location' => 'Cairo, Egypt',
            'level' => 'Midd-Senior',
            'availability' => 'Freelance',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Senior Full Stack Developer',
            'description' => 'Looking for an experienced full stack developer to join our growing team. You will work on cutting-edge technologies and help shape our product development.',
            'responsibility' => 'Develop and maintain web applications, Lead technical design discussions, Mentor junior developers, Collaborate with cross-functional teams',
            'qualifications' => '5+ years of experience in web development, Strong knowledge of React and Node.js, Experience with cloud platforms (AWS/Azure), Bachelor\'s degree in Computer Science or related field',
            'benifits' => 'Competitive salary, Health insurance, Flexible working hours, Remote work options, Professional development budget',
            'location' => 'Alexandria, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'UI/UX Designer',
            'description' => 'Seeking a creative UI/UX designer to create beautiful and intuitive user interfaces for our products.',
            'responsibility' => 'Create user-centered designs, Conduct user research, Create wireframes and prototypes, Collaborate with development team',
            'qualifications' => '3+ years of UI/UX design experience, Proficiency in Figma/Sketch, Strong portfolio, Understanding of user-centered design principles',
            'benifits' => 'Creative environment, Latest design tools, Health insurance, Annual bonus, Work-life balance',
            'location' => 'Remote',
            'level' => 'Mid-level',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'DevOps Engineer',
            'description' => 'Join our DevOps team to help build and maintain our cloud infrastructure and CI/CD pipelines.',
            'responsibility' => 'Manage cloud infrastructure, Implement CI/CD pipelines, Monitor system performance, Automate deployment processes',
            'qualifications' => 'Experience with Docker and Kubernetes, Knowledge of AWS/Azure, Strong scripting skills, Understanding of CI/CD principles',
            'benifits' => 'Competitive salary, Stock options, Health insurance, Learning opportunities, Flexible hours',
            'location' => 'Giza, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'Junior Frontend Developer',
            'description' => 'Great opportunity for a junior developer to grow their skills in a supportive environment.',
            'responsibility' => 'Develop responsive web interfaces, Work with modern JavaScript frameworks, Collaborate with design team, Write clean and maintainable code',
            'qualifications' => 'Basic knowledge of HTML, CSS, and JavaScript, Understanding of React basics, Eager to learn, Good problem-solving skills',
            'benifits' => 'Mentorship program, Training opportunities, Health insurance, Flexible working hours',
            'location' => 'Cairo, Egypt',
            'level' => 'Junior',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Scrum Master',
            'description' => 'Looking for an experienced Scrum Master to facilitate agile development processes and help teams deliver high-quality products efficiently.',
            'responsibility' => 'Facilitate daily stand-ups and sprint planning, Remove impediments, Coach team on agile practices, Track and report project progress',
            'qualifications' => 'Certified Scrum Master (CSM), 3+ years of experience in agile environments, Strong communication skills, Experience with Jira and agile tools',
            'benifits' => 'Competitive salary, Professional certifications support, Health insurance, Flexible working hours, Team building activities',
            'location' => 'Cairo, Egypt',
            'level' => 'Mid-level',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Tech HR Manager',
            'description' => 'Seeking an experienced HR Manager with tech industry background to lead our HR initiatives and talent acquisition strategies.',
            'responsibility' => 'Develop recruitment strategies, Manage employee relations, Oversee performance management, Handle HR operations',
            'qualifications' => '5+ years HR experience in tech industry, Strong understanding of tech roles, Excellent communication skills, HR certification preferred',
            'benifits' => 'Leadership role, Competitive salary, Health insurance, Professional development, Annual bonus',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'Data Analyst',
            'description' => 'Join our data team to analyze business metrics and help drive data-informed decisions across the organization.',
            'responsibility' => 'Analyze large datasets, Create reports and dashboards, Identify trends and patterns, Collaborate with stakeholders',
            'qualifications' => 'Strong SQL skills, Experience with data visualization tools, Knowledge of Python/R, Understanding of statistical analysis',
            'benifits' => 'Data-driven environment, Learning opportunities, Health insurance, Flexible hours, Remote work options',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid-level',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'Technical Product Manager',
            'description' => 'Looking for a Technical Product Manager to bridge the gap between business needs and technical implementation.',
            'responsibility' => 'Define product requirements, Create product roadmaps, Work with development teams, Analyze market trends',
            'qualifications' => '3+ years in product management, Technical background, Strong analytical skills, Experience with agile methodologies',
            'benifits' => 'Product leadership role, Competitive salary, Stock options, Health insurance, Professional development',
            'location' => 'Giza, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
        ]);

        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'QA Automation Engineer',
            'description' => 'Join our quality assurance team to develop and maintain automated testing solutions for our products.',
            'responsibility' => 'Develop automated test scripts, Perform code reviews, Create test plans, Report and track bugs',
            'qualifications' => 'Experience with Selenium/Playwright, Knowledge of testing frameworks, Programming skills in Python/Java, Understanding of CI/CD',
            'benifits' => 'Technical growth opportunities, Health insurance, Flexible hours, Training budget, Team collaboration',
            'location' => 'Cairo, Egypt',
            'level' => 'Mid-level',
            'availability' => 'Full-time',
        ]);

        JobOfferUser::factory()->create([
            'job_offer_id' => 1, 
            'user_id' => 2,
            'stage' => 'shortlisted',
        ]);
    }
}
