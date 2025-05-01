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
            'avatar' => 'avatars/microsoft.png',
        ]);

        User::factory()->create([
            'name' => 'Google',
            'email' => 'careers@google.com',
            'phonenumber' => '0901',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Technology / Search Engine',
            'summary' => 'Google is a global technology leader focused on improving the way people connect with information.',
            'avatar' => 'avatars/google.png',
        ]);

        User::factory()->create([
            'name' => 'Amazon',
            'email' => 'jobs@amazon.com',
            'phonenumber' => '0902',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'E-commerce / Technology',
            'summary' => 'Amazon is Earth\'s most customer-centric company, working to build a better future for everyone.',
            'avatar' => 'avatars/amazon.png',
        ]);

        User::factory()->create([
            'name' => 'Valeo',
            'email' => 'careers@valeo.com',
            'phonenumber' => '0903',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Automotive / Technology',
            'summary' => 'Valeo is a global automotive supplier, partner to all carmakers and new mobility actors.',
            'avatar' => 'avatars/valeo.png',
        ]);

        User::factory()->create([
            'name' => 'IBM',
            'email' => 'recruitment@ibm.com',
            'phonenumber' => '0904',
            'role' => 'employer',
            'password' => '3244039',
            'headline' => 'Technology / Consulting',
            'summary' => 'IBM is a leading cloud platform and cognitive solutions company.',
            'avatar' => 'avatars/ibm.png',
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
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-03-15 10:00:00',
            'updated_at' => '2024-03-15 10:00:00'
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
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2024-04-20 14:30:00',
            'updated_at' => '2024-04-20 14:30:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'UI/UX Designer',
            'description' => 'Seeking a creative UI/UX designer to create beautiful and intuitive user interfaces for our products.',
            'responsibility' => 'Create user-centered designs, Conduct user research, Create wireframes and prototypes, Collaborate with development team',
            'qualifications' => '3+ years of UI/UX design experience, Proficiency in Figma/Sketch, Strong portfolio, Understanding of user-centered design principles',
            'benifits' => 'Creative environment, Latest design tools, Health insurance, Annual bonus, Work-life balance',
            'location' => 'Remote',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-05-10 09:15:00',
            'updated_at' => '2024-05-10 09:15:00'
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
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-06-05 11:45:00',
            'updated_at' => '2024-06-05 11:45:00'
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
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-07-22 16:20:00',
            'updated_at' => '2024-07-22 16:20:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Scrum Master',
            'description' => 'Looking for an experienced Scrum Master to facilitate agile development processes and help teams deliver high-quality products efficiently.',
            'responsibility' => 'Facilitate daily stand-ups and sprint planning, Remove impediments, Coach team on agile practices, Track and report project progress',
            'qualifications' => 'Certified Scrum Master (CSM), 3+ years of experience in agile environments, Strong communication skills, Experience with Jira and agile tools',
            'benifits' => 'Competitive salary, Professional certifications support, Health insurance, Flexible working hours, Team building activities',
            'location' => 'Cairo, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-08-15 13:10:00',
            'updated_at' => '2024-08-15 13:10:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Tech HR Manager',
            'description' => 'Seeking an experienced HR Manager with tech industry background to lead our HR initiatives and talent acquisition strategies.',
            'responsibility' => 'Develop recruitment strategies, Manage employee relations, Oversee performance management, Handle HR operations',
            'qualifications' => '5+ years HR experience in tech industry, Strong understanding of tech roles, Excellent communication skills, HR certification preferred',
            'benifits' => 'Leadership role, Competitive salary, Health insurance, Professional development, Annual bonus',
            'location' => 'Cairo, Egypt',
            'level' => 'Manager',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2024-09-30 10:45:00',
            'updated_at' => '2024-09-30 10:45:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'Data Analyst',
            'description' => 'Join our data team to analyze business metrics and help drive data-informed decisions across the organization.',
            'responsibility' => 'Analyze large datasets, Create reports and dashboards, Identify trends and patterns, Collaborate with stakeholders',
            'qualifications' => 'Strong SQL skills, Experience with data visualization tools, Knowledge of Python/R, Understanding of statistical analysis',
            'benifits' => 'Data-driven environment, Learning opportunities, Health insurance, Flexible hours, Remote work options',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2024-10-12 15:30:00',
            'updated_at' => '2024-10-12 15:30:00'
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
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2024-11-25 09:00:00',
            'updated_at' => '2024-11-25 09:00:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'QA Automation Engineer',
            'description' => 'Join our quality assurance team to develop and maintain automated testing solutions for our products.',
            'responsibility' => 'Develop automated test scripts, Perform code reviews, Create test plans, Report and track bugs',
            'qualifications' => 'Experience with Selenium/Playwright, Knowledge of testing frameworks, Programming skills in Python/Java, Understanding of CI/CD',
            'benifits' => 'Technical growth opportunities, Health insurance, Flexible hours, Training budget, Team collaboration',
            'location' => 'Cairo, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2024-12-18 14:15:00',
            'updated_at' => '2024-12-18 14:15:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Senior UI/UX Designer',
            'description' => 'Lead the design of innovative user interfaces and experiences for our products.',
            'responsibility' => 'Create user-centered designs, Lead design reviews, Mentor junior designers, Collaborate with product teams',
            'qualifications' => '5+ years UI/UX experience, Strong portfolio, Proficiency in Figma/Sketch, Leadership skills',
            'benifits' => 'Competitive salary, Creative freedom, Health insurance, Professional development',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2025-01-10 11:30:00',
            'updated_at' => '2025-01-10 11:30:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Graphic Designer',
            'description' => 'Create visually stunning graphics and marketing materials for our brand.',
            'responsibility' => 'Design marketing materials, Create brand assets, Work with marketing team, Maintain brand consistency',
            'qualifications' => '3+ years graphic design experience, Adobe Creative Suite mastery, Strong portfolio',
            'benifits' => 'Creative environment, Latest design tools, Health insurance, Annual bonus',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2025-02-15 13:45:00',
            'updated_at' => '2025-02-15 13:45:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'Digital Marketing Manager',
            'description' => 'Lead our digital marketing efforts and drive online growth.',
            'responsibility' => 'Develop digital strategies, Manage campaigns, Analyze metrics, Lead marketing team',
            'qualifications' => '5+ years digital marketing experience, Strong analytical skills, Leadership abilities',
            'benifits' => 'Competitive salary, Performance bonuses, Health insurance, Professional development',
            'location' => 'Cairo, Egypt',
            'level' => 'Manager',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Master',
            'gender' => 'Any',
            'created_at' => '2025-03-20 10:00:00',
            'updated_at' => '2025-03-20 10:00:00'
        ]);

        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'Content Marketing Specialist',
            'description' => 'Create engaging content that drives brand awareness and customer engagement.',
            'responsibility' => 'Write blog posts, Create social media content, Develop content strategy, Analyze performance',
            'qualifications' => '3+ years content marketing experience, Strong writing skills, SEO knowledge',
            'benifits' => 'Creative freedom, Health insurance, Flexible hours, Remote work options',
            'location' => 'Remote',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'job_type' => 'Full-time',
            'qualification' => 'Bachelor',
            'gender' => 'Any',
            'created_at' => '2025-04-05 15:20:00',
            'updated_at' => '2025-04-05 15:20:00'
        ]);

        // Create 10 jobs for each category (8 categories total)
        
        // Category 1: Design & Creative
        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Senior UI/UX Designer',
            'description' => 'Lead the design of innovative user interfaces and experiences for our products.',
            'responsibility' => 'Create user-centered designs, Lead design reviews, Mentor junior designers, Collaborate with product teams',
            'qualifications' => '5+ years UI/UX experience, Strong portfolio, Proficiency in Figma/Sketch, Leadership skills',
            'benifits' => 'Competitive salary, Creative freedom, Health insurance, Professional development',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 1,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Graphic Designer',
            'description' => 'Create visually stunning graphics and marketing materials for our brand.',
            'responsibility' => 'Design marketing materials, Create brand assets, Work with marketing team, Maintain brand consistency',
            'qualifications' => '3+ years graphic design experience, Adobe Creative Suite mastery, Strong portfolio',
            'benifits' => 'Creative environment, Latest design tools, Health insurance, Annual bonus',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 1,
        ]);

        // Category 2: Marketing
        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'Digital Marketing Manager',
            'description' => 'Lead our digital marketing efforts and drive online growth.',
            'responsibility' => 'Develop digital strategies, Manage campaigns, Analyze metrics, Lead marketing team',
            'qualifications' => '5+ years digital marketing experience, Strong analytical skills, Leadership abilities',
            'benifits' => 'Competitive salary, Performance bonuses, Health insurance, Professional development',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 2,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'Content Marketing Specialist',
            'description' => 'Create engaging content that drives brand awareness and customer engagement.',
            'responsibility' => 'Write blog posts, Create social media content, Develop content strategy, Analyze performance',
            'qualifications' => '3+ years content marketing experience, Strong writing skills, SEO knowledge',
            'benifits' => 'Creative freedom, Health insurance, Flexible hours, Remote work options',
            'location' => 'Remote',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 2,
        ]);

        // Category 3: Telemarketing
        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'Sales Team Lead',
            'description' => 'Lead and manage our telemarketing team to achieve sales targets.',
            'responsibility' => 'Lead sales team, Monitor performance, Train new hires, Develop sales strategies',
            'qualifications' => '5+ years sales experience, Leadership skills, Strong communication abilities',
            'benifits' => 'Competitive salary, Commission structure, Health insurance, Leadership training',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 3,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Customer Service Representative',
            'description' => 'Provide excellent customer service and support through phone and email.',
            'responsibility' => 'Handle customer inquiries, Resolve issues, Maintain customer records, Provide support',
            'qualifications' => '2+ years customer service experience, Strong communication skills, Problem-solving abilities',
            'benifits' => 'Health insurance, Training program, Career growth opportunities',
            'location' => 'Giza, Egypt',
            'level' => 'Junior',
            'availability' => 'Full-time',
            'category_id' => 3,
        ]);

        // Category 4: Software & Web
        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'Senior Full Stack Developer',
            'description' => 'Lead the development of our web applications and services.',
            'responsibility' => 'Develop applications, Lead technical decisions, Mentor junior developers, Code reviews',
            'qualifications' => '5+ years full stack development, Strong in React/Node.js, Cloud experience',
            'benifits' => 'Competitive salary, Stock options, Health insurance, Remote work options',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 4,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'DevOps Engineer',
            'description' => 'Build and maintain our cloud infrastructure and CI/CD pipelines.',
            'responsibility' => 'Manage cloud infrastructure, Implement CI/CD, Monitor systems, Automate processes',
            'qualifications' => '3+ years DevOps experience, AWS/Azure knowledge, Docker/Kubernetes expertise',
            'benifits' => 'Competitive salary, Health insurance, Learning opportunities, Flexible hours',
            'location' => 'Remote',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 4,
        ]);

        // Category 5: Administration
        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'Office Manager',
            'description' => 'Oversee daily office operations and administrative functions.',
            'responsibility' => 'Manage office operations, Supervise staff, Handle budgets, Coordinate events',
            'qualifications' => '5+ years office management, Strong organizational skills, Leadership abilities',
            'benifits' => 'Competitive salary, Health insurance, Professional development, Team leadership role',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 5,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'Executive Assistant',
            'description' => 'Provide high-level administrative support to company executives.',
            'responsibility' => 'Manage schedules, Handle correspondence, Coordinate meetings, Prepare reports',
            'qualifications' => '3+ years executive support, Strong organizational skills, Professional demeanor',
            'benifits' => 'Health insurance, Professional development, Flexible hours, Executive exposure',
            'location' => 'Giza, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 5,
        ]);

        // Category 6: Teaching & Education
        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Computer Science Instructor',
            'description' => 'Teach computer science courses and mentor students in programming.',
            'responsibility' => 'Teach courses, Develop curriculum, Mentor students, Grade assignments',
            'qualifications' => 'Master\'s in Computer Science, Teaching experience, Strong programming skills',
            'benifits' => 'Competitive salary, Health insurance, Research opportunities, Academic freedom',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 6,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 2,
            'name' => 'English Language Teacher',
            'description' => 'Teach English language courses to students of various levels.',
            'responsibility' => 'Teach classes, Prepare lessons, Assess students, Provide feedback',
            'qualifications' => 'TEFL certification, Teaching experience, Strong communication skills',
            'benifits' => 'Health insurance, Professional development, Flexible schedule, Teaching resources',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid',
            'availability' => 'Part-time',
            'category_id' => 6,
        ]);

        // Category 7: Engineering
        JobOffer::factory()->create([
            'employer_id' => 3,
            'name' => 'Senior Mechanical Engineer',
            'description' => 'Lead mechanical engineering projects and design solutions.',
            'responsibility' => 'Design systems, Lead projects, Mentor engineers, Review designs',
            'qualifications' => '5+ years mechanical engineering, Strong CAD skills, Leadership experience',
            'benifits' => 'Competitive salary, Health insurance, Professional development, Leadership role',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 7,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 4,
            'name' => 'Electrical Engineer',
            'description' => 'Design and implement electrical systems and solutions.',
            'responsibility' => 'Design systems, Create schematics, Test equipment, Document processes',
            'qualifications' => '3+ years electrical engineering, Strong technical skills, Problem-solving abilities',
            'benifits' => 'Health insurance, Professional development, Technical training, Career growth',
            'location' => 'Giza, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 7,
        ]);

        // Category 8: Garments & Textile
        JobOffer::factory()->create([
            'employer_id' => 5,
            'name' => 'Fashion Designer',
            'description' => 'Create innovative fashion designs and collections.',
            'responsibility' => 'Design collections, Create patterns, Select materials, Lead design team',
            'qualifications' => '5+ years fashion design, Strong portfolio, Trend awareness, Leadership skills',
            'benifits' => 'Competitive salary, Creative freedom, Health insurance, Professional development',
            'location' => 'Cairo, Egypt',
            'level' => 'Senior',
            'availability' => 'Full-time',
            'category_id' => 8,
        ]);

        JobOffer::factory()->create([
            'employer_id' => 1,
            'name' => 'Textile Production Manager',
            'description' => 'Oversee textile production processes and quality control.',
            'responsibility' => 'Manage production, Ensure quality, Train staff, Optimize processes',
            'qualifications' => '3+ years textile production, Strong management skills, Quality control experience',
            'benifits' => 'Health insurance, Professional development, Leadership training, Career growth',
            'location' => 'Alexandria, Egypt',
            'level' => 'Mid',
            'availability' => 'Full-time',
            'category_id' => 8,
        ]);

        // Create 10 job applications for each job offer
        JobOfferUser::factory()->create([
            'job_offer_id' => 1, 
            'user_id' => 6,
            'stage' => 'shortlisted',
        ]);
    }
}
