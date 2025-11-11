import { useTranslation } from '@/hooks/use-translation';
import AppLogoIcon from './app-logo-icon';
export default function AppLogo() {
    const { t } = useTranslation();
    return (
        <section className='flex items-center gap-1'>
            <div className="flex aspect-square items-center justify-center rounded-md">
                <AppLogoIcon className="size-9 fill-current" />
            </div>
            <div className="ml-1 rtl:ml-auto rtl:mr-1 grid flex-1 text-left rtl:text-right text-sm">
                <span className="mb-0.5 truncate leading-tight font-semibold">
                    {t('common.college_name')}
                </span>
            </div>
        </section>
    );
}
