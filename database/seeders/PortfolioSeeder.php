<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Default Admin User for the manage. subdomain
        User::updateOrCreate(
            ['email' => 'admin@portfolio.local'],
            [
                'name' => 'Portfolio Administrator',
                'password' => bcrypt('admin12345'),
            ]
        );

        // 1. Profile / Bio / Contact details
        Profile::create([
            'name' => 'Alexander Vance',
            'title' => 'Senior Full-Stack Engineer & Software Architect',
            'tagline' => 'Crafting enduring, high-performance web systems with architectural discipline.',
            'bio' => "I am a full-stack engineer and software architect with over six years of professional experience building resilient backend architectures, high-concurrency systems, and polished, accessible user interfaces.\n\nMy philosophy balances classical engineering craftsmanship with modern minimalist design: clean typography, zero bloat, type-safety, and dependable scalability. Whether architecting distributed systems or refining micro-interactions, I focus on building digital products that stand the test of time.",
            'short_bio' => 'Specializing in Laravel, TypeScript, distributed systems, Tailwind CSS, and Material Web component architectures.',
            'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            'location' => 'San Francisco, CA / Remote Worldwide',
            'email' => 'alexander.vance.dev@gmail.com',
            'phone' => '+1 (415) 890-4321',
            'github_url' => 'https://github.com/alexandervance-dev',
            'linkedin_url' => 'https://linkedin.com/in/alexander-vance',
            'twitter_url' => 'https://x.com/alexvance_dev',
            'website_url' => 'https://alexandervance.dev',
            'resume_url' => '#',
            'availability_status' => 'Available for selective contracts & architectural advisory',
            'years_of_experience' => 6,
        ]);

        // 2. Education
        Education::create([
            'institution' => 'University of California, Berkeley',
            'degree' => 'Bachelor of Science in Computer Science',
            'field_of_study' => 'Computer Science & Software Systems',
            'start_year' => '2018',
            'end_year' => '2022',
            'grade' => 'GPA 3.92 / 4.00 (Magna Cum Laude)',
            'description' => 'Focused on distributed computing, database management systems, and algorithmic efficiency. Completed senior capstone on fault-tolerant consensus mechanisms in microservice networks.',
            'achievements' => [
                'Dean\'s Honors List for 7 consecutive academic semesters',
                'Lead Undergraduate Researcher in Distributed Storage Systems',
                'President of the Open Source Engineering Society (2021 - 2022)',
            ],
            'sort_order' => 1,
        ]);

        Education::create([
            'institution' => 'Stanford Center for Professional Development',
            'degree' => 'Advanced Graduate Certificate',
            'field_of_study' => 'Cloud Systems & Scalable Database Architectures',
            'start_year' => '2022',
            'end_year' => '2023',
            'grade' => 'Distinction with Honors',
            'description' => 'Specialized coursework covering cloud-native computing, partitioned data stores, high-availability replication protocols, and container orchestration.',
            'achievements' => [
                'Capstone Excellence Award for high-throughput stream processing blueprint',
            ],
            'sort_order' => 2,
        ]);

        // 3. Experience
        Experience::create([
            'role' => 'Lead Full-Stack Engineer',
            'company' => 'Lumina Cloud Infrastructure',
            'company_url' => 'https://lumina.example.com',
            'location' => 'San Francisco, CA (Hybrid)',
            'start_date' => '2023',
            'end_date' => 'Present',
            'is_current' => true,
            'description' => 'Directing the architecture and implementation of Lumina\'s next-generation telemetry platform and customer control portal.',
            'highlights' => [
                'Architected unified multi-tenant telemetry ingestion pipeline handling 18M+ events/day with 99.99% uptime.',
                'Spearheaded modern component design system transition using Tailwind CSS and Material Web components, boosting team shipping velocity by 40%.',
                'Reduced API p99 latency from 310ms to 42ms through strategic Redis caching layers and SQL query refactoring.',
                'Mentored 6 junior and mid-level software engineers across backend, automated testing, and web accessibility standards.',
            ],
            'technologies' => ['Laravel', 'PHP 8.4', 'Tailwind CSS', 'Material Web', 'PostgreSQL', 'Redis', 'Docker', 'AWS'],
            'sort_order' => 1,
        ]);

        Experience::create([
            'role' => 'Senior Backend Engineer',
            'company' => 'Meridian Financial Technologies',
            'company_url' => 'https://meridian.example.com',
            'location' => 'New York, NY (Remote)',
            'start_date' => '2021',
            'end_date' => '2023',
            'is_current' => false,
            'description' => 'Developed core transaction engines, reconciliation systems, and third-party payment integration APIs for enterprise fintech clients.',
            'highlights' => [
                'Designed idempotent payment processing gateway processing over $45M in gross volume each month.',
                'Implemented automated audit trails and cryptographic log verification satisfying SOC2 Type II compliance.',
                'Integrated multiple banking clearinghouses via REST and Webhook protocols with automated retry mechanisms.',
            ],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'RabbitMQ', 'Tailwind CSS', 'Docker', 'Stripe API'],
            'sort_order' => 2,
        ]);

        Experience::create([
            'role' => 'Software Developer',
            'company' => 'Monolith Digital Solutions',
            'company_url' => 'https://monolith.example.com',
            'location' => 'Austin, TX (Remote)',
            'start_date' => '2019',
            'end_date' => '2021',
            'is_current' => false,
            'description' => 'Built high-traffic custom web platforms, e-commerce stores, and content management systems for national brands.',
            'highlights' => [
                'Engineered 14+ bespoke web applications and API microservices from initial scoping to production deployment.',
                'Improved page load speeds by 65% across client sites by optimizing asset bundling, queries, and critical rendering paths.',
            ],
            'technologies' => ['Laravel', 'PHP', 'JavaScript', 'Tailwind CSS', 'MySQL', 'Git'],
            'sort_order' => 3,
        ]);

        // 4. Projects (Git repo + live link included)
        Project::create([
            'title' => 'Aura Task Orchestrator',
            'slug' => 'aura-task-orchestrator',
            'tagline' => 'High-concurrency distributed job pipeline & workflow scheduler',
            'description' => 'A robust, self-hosted job orchestrator built with Laravel and Redis. Features real-time worker telemetry, intelligent rate-limiting, dead-letter queue analysis, and interactive visual DAG pipelines.',
            'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
            'category' => 'Distributed Systems & Backend',
            'github_url' => 'https://github.com/alexandervance-dev/aura-orchestrator',
            'website_url' => 'https://aura-orchestrator.demo.dev',
            'technologies' => ['Laravel', 'PHP 8.4', 'Redis', 'Tailwind CSS', 'Material Web', 'WebSockets', 'Docker'],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'Chronicle Docs Engine',
            'slug' => 'chronicle-docs-engine',
            'tagline' => 'Classical typographic markdown publishing & documentation system',
            'description' => 'A minimalist documentation platform designed around classical editorial typography and lightning-fast full-text search. Supports algorithmic dark/light themes, offline PWA caching, and automated API spec parsing.',
            'thumbnail' => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=800&q=80',
            'category' => 'Developer Tools & UI',
            'github_url' => 'https://github.com/alexandervance-dev/chronicle-docs',
            'website_url' => 'https://chronicle.demo.dev',
            'technologies' => ['Laravel', 'Tailwind CSS', 'Material Web M3', 'SQLite', 'Alpine.js'],
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Veritas Metrics & Analytics',
            'slug' => 'veritas-analytics',
            'tagline' => 'Cookieless, privacy-first web telemetry & event analytics platform',
            'description' => 'An ethical, lightweight alternative to bloated tracking suites. Collects privacy-preserving event data, computes real-time retention matrices, and renders beautiful Material Design 3 interactive charts.',
            'thumbnail' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
            'category' => 'Full-Stack Web Application',
            'github_url' => 'https://github.com/alexandervance-dev/veritas-analytics',
            'website_url' => 'https://veritas-analytics.demo.dev',
            'technologies' => ['Laravel', 'PostgreSQL', 'Tailwind CSS', 'Material Web', 'Chart.js', 'REST API'],
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        Project::create([
            'title' => 'Symphony Modular Commerce',
            'slug' => 'symphony-modular-commerce',
            'tagline' => 'Headless e-commerce core with atomic inventory locks and payment orchestration',
            'description' => 'High-reliability digital commerce backend handling multi-currency orders, automatic invoice generation, Stripe/PayPal payment routing, and real-time stock sync.',
            'thumbnail' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=800&q=80',
            'category' => 'E-Commerce & FinTech',
            'github_url' => 'https://github.com/alexandervance-dev/symphony-commerce',
            'website_url' => 'https://symphony-store.demo.dev',
            'technologies' => ['Laravel', 'Tailwind CSS', 'MySQL', 'Stripe API', 'Material Web'],
            'is_featured' => false,
            'sort_order' => 4,
        ]);

        Project::create([
            'title' => 'Helios API Profiler',
            'slug' => 'helios-api-profiler',
            'tagline' => 'Real-time database query bottleneck detector and payload analyzer',
            'description' => 'A developer companion tool that monitors SQL statement counts, detects N+1 execution flaws, inspects memory allocations, and provides actionable code suggestions.',
            'thumbnail' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80',
            'category' => 'Developer Productivity',
            'github_url' => 'https://github.com/alexandervance-dev/helios-profiler',
            'website_url' => 'https://helios-profiler.demo.dev',
            'technologies' => ['PHP 8.4', 'Laravel', 'SQLite', 'Tailwind CSS'],
            'is_featured' => false,
            'sort_order' => 5,
        ]);

        // 5. Skills: Programming Languages, Frameworks, Databases & Tools
        $skills = [
            // Programming Languages
            ['name' => 'PHP 8.x', 'category' => 'programming_language', 'proficiency' => 96, 'icon' => 'code', 'sort_order' => 1],
            ['name' => 'TypeScript / JavaScript', 'category' => 'programming_language', 'proficiency' => 92, 'icon' => 'javascript', 'sort_order' => 2],
            ['name' => 'SQL (PostgreSQL / MySQL)', 'category' => 'programming_language', 'proficiency' => 90, 'icon' => 'database', 'sort_order' => 3],
            ['name' => 'Python', 'category' => 'programming_language', 'proficiency' => 84, 'icon' => 'terminal', 'sort_order' => 4],
            ['name' => 'Go', 'category' => 'programming_language', 'proficiency' => 78, 'icon' => 'speed', 'sort_order' => 5],
            ['name' => 'HTML5 & Modern CSS', 'category' => 'programming_language', 'proficiency' => 95, 'icon' => 'html', 'sort_order' => 6],

            // Frameworks
            ['name' => 'Laravel Framework', 'category' => 'framework', 'proficiency' => 98, 'icon' => 'layers', 'sort_order' => 1],
            ['name' => 'Tailwind CSS', 'category' => 'framework', 'proficiency' => 96, 'icon' => 'style', 'sort_order' => 2],
            ['name' => 'Material Web Components (M3)', 'category' => 'framework', 'proficiency' => 92, 'icon' => 'widgets', 'sort_order' => 3],
            ['name' => 'Vue.js / React', 'category' => 'framework', 'proficiency' => 88, 'icon' => 'view_quilt', 'sort_order' => 4],
            ['name' => 'Alpine.js', 'category' => 'framework', 'proficiency' => 90, 'icon' => 'bolt', 'sort_order' => 5],
            ['name' => 'Livewire / Inertia.js', 'category' => 'framework', 'proficiency' => 89, 'icon' => 'sync_alt', 'sort_order' => 6],

            // Databases & Storage
            ['name' => 'PostgreSQL', 'category' => 'database', 'proficiency' => 92, 'icon' => 'storage', 'sort_order' => 1],
            ['name' => 'MySQL / MariaDB', 'category' => 'database', 'proficiency' => 90, 'icon' => 'table_chart', 'sort_order' => 2],
            ['name' => 'SQLite', 'category' => 'database', 'proficiency' => 95, 'icon' => 'folder_zip', 'sort_order' => 3],
            ['name' => 'Redis (Cache & Queues)', 'category' => 'database', 'proficiency' => 91, 'icon' => 'memory', 'sort_order' => 4],

            // Architecture, DevOps & Tools
            ['name' => 'Docker & Containerization', 'category' => 'tools', 'proficiency' => 88, 'icon' => 'inventory_2', 'sort_order' => 1],
            ['name' => 'Git & GitHub Workflows', 'category' => 'tools', 'proficiency' => 95, 'icon' => 'commit', 'sort_order' => 2],
            ['name' => 'CI/CD Pipelines (GitHub Actions)', 'category' => 'tools', 'proficiency' => 89, 'icon' => 'published_with_changes', 'sort_order' => 3],
            ['name' => 'RESTful API & GraphQL Design', 'category' => 'tools', 'proficiency' => 94, 'icon' => 'hub', 'sort_order' => 4],
            ['name' => 'AWS Cloud Services', 'category' => 'tools', 'proficiency' => 84, 'icon' => 'cloud_queue', 'sort_order' => 5],
            ['name' => 'Automated Testing (Pest / PHPUnit)', 'category' => 'tools', 'proficiency' => 92, 'icon' => 'fact_check', 'sort_order' => 6],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
