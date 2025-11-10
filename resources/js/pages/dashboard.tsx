import { DashboardCard } from '@/components/dashboard-card';
import { useTranslation } from '@/hooks/use-translation';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { Auth, type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import {
    Users,
    UserCircle,
    Crown,
    Database
} from 'lucide-react';
import { useEffect } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

export default function Dashboard() {
    const { auth } = usePage<{ auth: Auth }>().props;
    const { t, load } = useTranslation();

    useEffect(() => {
        load(['dashboard', 'auth']);
    }, [load]);
    const openCards = [
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
    ];
    console.log(t('dashboard.title'));

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
                            {t('dashboard.title')}
                        </p>
                    </div>

                    {/* Navigation Cards - Open */}
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                        {openCards.map((card, index) => {
                            return (
                                <DashboardCard
                                    key={index}
                                    card={{
                                        icon: card.icon,
                                        title: card.title,
                                        description: card.description,
                                        href: card.href,
                                        color: card.color,
                                        iconBg: card.iconBg,
                                        iconColor: card.iconColor
                                    }}
                                />
                            );
                        })}

                        {auth.data.roles.includes('hr') && (
                            <DashboardCard
                                card={{
                                    icon: Users,
                                    title: 'HR Management',
                                    description: 'Manage employees, recruitment, and human resources',
                                    href: '/hr',
                                    color: 'from-blue-500 to-blue-600',
                                    iconBg: 'bg-blue-100 dark:bg-blue-900/30',
                                    iconColor: 'text-blue-600 dark:text-blue-400'
                                }}
                            />
                        )}

                        {auth.data.roles.includes('head') && (
                            <DashboardCard
                                card={{
                                    icon: Crown,
                                    title: 'Department Head',
                                    description: 'Oversee operations and team management',
                                    href: '/hr',
                                    color: 'from-purple-500 to-purple-600',
                                    iconBg: 'bg-purple-100 dark:bg-purple-900/30',
                                    iconColor: 'text-purple-600 dark:text-purple-400'
                                }}
                            />
                        )}
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
