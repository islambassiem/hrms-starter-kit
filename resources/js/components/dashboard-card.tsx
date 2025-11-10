import React from "react";

type DashboardCardProps = {
    icon: React.ElementType,
    title: string,
    description: string,
    href: string,
    color: string,
    iconBg: string,
    iconColor: string
}
export const DashboardCard = ({ card }: { card: DashboardCardProps }) => {
    const Icon = card.icon;
    return (
        <a
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
};

