import { usePage } from "@inertiajs/react";
import { useCallback, useState } from "react";

type Translations = Record<string, string>;

export function useTranslation() {
    const { translations: initialTranslations, language } = usePage().props as { translations?: Translations; language?: string };
    const [translations, setTranslations] = useState<Translations>(initialTranslations || {});

    function t(key: string, replacements: Record<string, string> = {}, fallback = key) {
        let translation = translations[key] || fallback;
        for (const replacement in replacements) {
            translation = translation.replace(`:${replacement}`, replacements[replacement] || "");
        }
        return translation;
    }


    const load = useCallback(async (groups?: string[]) => {
        const selectedGroups = groups && groups.length > 0 ? groups : [];

        const response = await fetch(`/translations/${selectedGroups.join(',')}`);
        const data = await response.json();
        setTranslations((prev) => ({ ...prev, ...data.translations }));
    }, [setTranslations]);

    return { t, language, load };
}
