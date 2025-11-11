import { usePage } from "@inertiajs/react";
import { useCallback, useRef, useState } from "react";

type Translations = Record<string, string>;

export function useTranslation() {
    const { translations: initialTranslations, language } = usePage().props as { translations?: Translations; language?: string };
    const [translations, setTranslations] = useState<Translations>(initialTranslations || {});
    const loadedRef = useRef(false);

    function t(key: string, replacements: Record<string, string> = {}, fallback = key) {
        let translation = translations[key] || fallback;
        for (const replacement in replacements) {
            translation = translation.replace(`:${replacement}`, replacements[replacement] || "");
        }
        return translation;
    }


    const load = useCallback(async (groups?: string[]) => {
        if (loadedRef.current) return; // already loaded, skip
        loadedRef.current = true;

        const selectedGroups = groups?.length ? groups : [];
        const response = await fetch(`/translations/${selectedGroups.join(',')}`);
        const data = await response.json();

        setTranslations((prev) => ({ ...prev, ...data.translations }));
    }, []);

    return { t, language, load };
}
