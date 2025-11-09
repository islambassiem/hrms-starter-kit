// import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import {
    Users,
    UserCircle,
    Crown,
    Database
} from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

export default function Dashboard() {
    const { auth } = usePage<{ auth: { data: { name: string } } }>().props;
    const cards = [
        {
            title: 'Employee Portal',
            description: 'Access your profile, requests, and documents',
            icon: UserCircle,
            href: '/employee',
            color: 'from-green-500 to-green-600',
            iconBg: 'bg-green-100 dark:bg-green-900/30',
            iconColor: 'text-green-600 dark:text-green-400'
        },
        {
            title: 'Open Data',
            description: 'Access public datasets and analytics',
            icon: Database,
            href: '/open-data',
            color: 'from-amber-500 to-amber-600',
            iconBg: 'bg-amber-100 dark:bg-amber-900/30',
            iconColor: 'text-amber-600 dark:text-amber-400'
        },
        {
            title: 'Department Head',
            description: 'Oversee operations and team management',
            icon: Crown,
            href: '/head',
            color: 'from-purple-500 to-purple-600',
            iconBg: 'bg-purple-100 dark:bg-purple-900/30',
            iconColor: 'text-purple-600 dark:text-purple-400'
        },
        {
            title: 'HR Management',
            description: 'Manage employees, recruitment, and human resources',
            icon: Users,
            href: '/hr',
            color: 'from-blue-500 to-blue-600',
            iconBg: 'bg-blue-100 dark:bg-blue-900/30',
            iconColor: 'text-blue-600 dark:text-blue-400'
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <main className="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
                <div className="w-full max-w-4xl">
                    {/* Welcome Message */}
                    <div className="text-center mb-12">
                        <h2 className="text-4xl font-bold text-gray-900 dark:text-white mb-3">
                            Welcome Back, {auth.data.name.split(' ')[0]}
                        </h2>
                        <p className="text-lg text-gray-600 dark:text-slate-400">
                            Select your workspace to get started
                        </p>
                    </div>

                    {/* Navigation Cards - Centered Grid */}
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                        {cards.map((card, index) => {
                            const Icon = card.icon;
                            return (
                                <a
                                    key={index}
                                    href={card.href}
                                    className="group relative bg-white dark:bg-slate-800 rounded-2xl shadow-md dark:shadow-xl hover:shadow-2xl dark:hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-slate-700 hover:border-transparent transform hover:scale-105"
                                >
                                    {/* Gradient Background on Hover */}
                                    <div className={`absolute inset-0 bg-gradient-to-br ${card.color} opacity-0 group-hover:opacity-100 transition-opacity duration-300`} />

                                    {/* Card Content */}
                                    <div className="relative p-8">
                                        <div className={`${card.iconBg} w-16 h-16 rounded-xl flex items-center justify-center mb-5 group-hover:bg-white/20 transition-colors duration-300`}>
                                            <Icon className={`w-8 h-8 ${card.iconColor} group-hover:text-white transition-colors duration-300`} />
                                        </div>

                                        <h3 className="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-white transition-colors duration-300">
                                            {card.title}
                                        </h3>

                                        <p className="text-gray-600 dark:text-slate-400 text-base group-hover:text-white/90 transition-colors duration-300">
                                            {card.description}
                                        </p>

                                        {/* Arrow Icon */}
                                        <div className="mt-5 flex items-center text-sm font-semibold text-gray-400 dark:text-slate-500 group-hover:text-white transition-colors duration-300">
                                            <span>Enter Workspace</span>
                                            <svg
                                                className="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform duration-300"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            );
                        })}
                    </div>
                </div>
            </main>

            {/* Footer (Optional) */}
            <footer className="py-6 text-center text-sm text-gray-500 dark:text-slate-500">
                Need help? Contact <a href="/support" className="text-blue-600 dark:text-blue-400 hover:underline">Support</a>
            </footer>
        </AppLayout>
    );
}
