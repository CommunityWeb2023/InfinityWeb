import "vanilla-cookieconsent/dist/cookieconsent.css";
import * as CookieConsent from "vanilla-cookieconsent";

const cookieConsentConfig = {
    guiOptions: {
        consentModal: {
            layout: "cloud inline",
            position: "bottom center",
            equalWeightButtons: true,
            flipButtons: false
        },
        preferencesModal: {
            layout: "box",
            position: "right",
            equalWeightButtons: true,
            flipButtons: false
        }
    },
    categories: {
        necessary: {
            readOnly: true
        },
        functionality: {},
        analytics: {},
        marketing: {}
    },
    language: {
        default: "en",
        autoDetect: "browser",
        translations: {
            en: {
                consentModal: {
                    title: "Hello traveller, it's cookie time!",
                    description: "We use cookies to enhance your experience on our website. By continuing to browse this site, you agree to our use of cookies. For more information, please see our Privacy Policy.",
                    acceptAllBtn: "Accept all",
                    acceptNecessaryBtn: "Reject all",
                    showPreferencesBtn: "Manage preferences",
                    footer: "<a href=\"#link\">Privacy Policy</a>\n<a href=\"#link\">Terms and conditions</a>",
                    closeIconLabel: "Reject all and close"
                },
                preferencesModal: {
                    title: "Consent Preferences Center",
                    acceptAllBtn: "Accept all",
                    acceptNecessaryBtn: "Reject all",
                    savePreferencesBtn: "Save preferences",
                    closeIconLabel: "Close modal",
                    serviceCounterLabel: "Service|Services",
                    sections: [
                        {
                            title: "Cookie Usage",
                            description: "We use cookies to enhance your experience on our website. By continuing to browse this site, you agree to our use of cookies. For more information, please see our Privacy Policy."
                        },
                        {
                            title: "Strictly Necessary Cookies <span class=\"pm__badge\">Always Enabled</span>",
                            description: "This website uses strictly necessary cookies to enable basic functions and ensure your security. These cookies are essential for the operation of the website and cannot be disabled. For more information, please see our Privacy Policy.",
                            linkedCategory: "necessary"
                        },
                        {
                            title: "Functionality Cookies",
                            description: "This website uses functionality cookies to personalize and enhance your user experience. These cookies store user preferences and enable additional features. You can disable these cookies in your browser settings. For more information, please see our Privacy Policy.",
                            linkedCategory: "functionality"
                        },
                        {
                            title: "Analytics Cookies",
                            description: "This website uses analytical cookies to understand website usage and improve our services. These cookies help us collect visitor statistics and perform analyses. You can opt out of these cookies in your browser settings. For more information, please see our Privacy Policy.",
                            linkedCategory: "analytics"
                        },
                        {
                            title: "Advertisement Cookies",
                            description: "This website uses advertising cookies to provide you with targeted advertising. These cookies collect information about your browsing activities to tailor advertising to your interests. You can opt out of these cookies in your browser settings. For more information, please see our Privacy Policy.",
                            linkedCategory: "marketing"
                        },
                        {
                            title: "More information",
                            description: "For any query in relation to my policy on cookies and your choices, please <a class=\"cc__link\" href=\"#yourdomain.com\">contact me</a>."
                        }
                    ]
                }
            },
            de: {
                consentModal: {
                    title: "Hallo Reisende, es ist Kekszeit!",
                    description: "Wir verwenden Cookies, um Ihr Erlebnis auf unserer Website zu verbessern. Mit dem Fortfahren auf dieser Seite stimmen Sie der Verwendung von Cookies zu. Weitere Informationen finden Sie in unserer Datenschutzerklärung.",
                    acceptAllBtn: "Alle akzeptieren",
                    acceptNecessaryBtn: "Alle ablehnen",
                    showPreferencesBtn: "Einstellungen verwalten",
                    footer: "<a href=\"#link\">Datenschutz</a>\n<a href=\"#link\">Bedingungen und Konditionen</a>",
                    closeIconLabel: "Alle ablehnen und schließen"
                },
                preferencesModal: {
                    title: "Präferenzen für die Zustimmung",
                    acceptAllBtn: "Alle akzeptieren",
                    acceptNecessaryBtn: "Alle ablehnen",
                    savePreferencesBtn: "Einstellungen speichern",
                    closeIconLabel: "Modal schließen",
                    serviceCounterLabel: "Dienstleistungen",
                    sections: [
                        {
                            title: "Verwendung von Cookies",
                            description: "Wir verwenden Cookies, um Ihr Erlebnis auf unserer Website zu verbessern. Mit dem Fortfahren auf dieser Seite stimmen Sie der Verwendung von Cookies zu. Weitere Informationen finden Sie in unserer Datenschutzerklärung."
                        },
                        {
                            title: "Streng Notwendige Cookies <span class=\"pm__badge\">Immer Aktiviert</span>",
                            description: "Diese Website verwendet streng notwendige Cookies, um grundlegende Funktionen zu ermöglichen und Ihre Sicherheit zu gewährleisten. Diese Cookies sind für das Funktionieren der Website erforderlich und können nicht deaktiviert werden. Weitere Informationen finden Sie in unserer Datenschutzerklärung.",
                            linkedCategory: "necessary"
                        },
                        {
                            title: "Funktionalitäts Cookies",
                            description: "Diese Website verwendet Funktionalitäts-Cookies, um Ihre Nutzererfahrung zu personalisieren und zu verbessern. Diese Cookies speichern Benutzereinstellungen und ermöglichen zusätzliche Funktionen. Sie können diese Cookies in den Browsereinstellungen deaktivieren. Weitere Informationen finden Sie in unserer Datenschutzerklärung.",
                            linkedCategory: "functionality"
                        },
                        {
                            title: "Analytische Cookies",
                            description: "Diese Website verwendet analytische Cookies, um die Nutzung der Website zu verstehen und unsere Dienste zu verbessern. Diese Cookies helfen uns, Besucherstatistiken zu sammeln und Analysen durchzuführen. Sie können die Verwendung dieser Cookies in Ihren Browsereinstellungen ablehnen. Weitere Informationen finden Sie in unserer Datenschutzerklärung.",
                            linkedCategory: "analytics"
                        },
                        {
                            title: "Werbung Cookies",
                            description: "Diese Website verwendet Werbe-Cookies, um Ihnen zielgerichtete Werbung anzubieten. Diese Cookies sammeln Informationen über Ihre Surfaktivitäten, um Werbung auf Ihre Interessen abzustimmen. Sie können die Verwendung dieser Cookies in Ihren Browsereinstellungen ablehnen. Weitere Informationen finden Sie in unserer Datenschutzerklärung.",
                            linkedCategory: "marketing"
                        },
                        {
                            title: "Weitere Informationen",
                            description: "For any query in relation to my policy on cookies and your choices, please <a class=\"cc__link\" href=\"/faq\">contact me</a>."
                        }
                    ]
                }
            },
            fr: {
                consentModal: {
                    title: "Bonjour voyageur, c'est l'heure des cookies!",
                    description: "Nous utilisons des cookies pour améliorer votre expérience sur notre site web. En continuant à naviguer sur ce site, vous acceptez l'utilisation de cookies. Pour plus d'informations, veuillez consulter notre Politique de confidentialité.",
                    acceptAllBtn: "Accepter tout",
                    acceptNecessaryBtn: "Tout rejeter",
                    showPreferencesBtn: "Gérer les préférences",
                    footer: "<a href=\"#link\">Politique de confidentialité</a>\n<a href=\"#link\">Termes et conditions</a>",
                    closeIconLabel: "Tout rejeter et fermer"
                },
                preferencesModal: {
                    title: "Préférences de cookies",
                    acceptAllBtn: "Accepter tout",
                    acceptNecessaryBtn: "Tout rejeter",
                    savePreferencesBtn: "Sauver les préférences",
                    closeIconLabel: "Fermer la modale",
                    serviceCounterLabel: "Services",
                    sections: [
                        {
                            title: "Utilisation de Cookies",
                            description: "Nous utilisons des cookies pour améliorer votre expérience sur notre site web. En continuant à naviguer sur ce site, vous acceptez l'utilisation de cookies. Pour plus d'informations, veuillez consulter notre Politique de confidentialité."
                        },
                        {
                            title: "Cookies Strictement Nécessaires <span class=\"pm__badge\">Toujours Activé</span>",
                            description: "Ce site utilise des cookies strictement nécessaires pour activer les fonctions de base et garantir votre sécurité. Ces cookies sont essentiels au fonctionnement du site et ne peuvent pas être désactivés. Pour plus d'informations, veuillez consulter notre Politique de confidentialité.",
                            linkedCategory: "necessary"
                        },
                        {
                            title: "Cookies de Fonctionnalité",
                            description: "Ce site utilise des cookies de fonctionnalité pour personnaliser et améliorer votre expérience utilisateur. Ces cookies stockent les préférences des utilisateurs et permettent des fonctionnalités supplémentaires. Vous pouvez désactiver ces cookies dans les paramètres de votre navigateur. Pour plus d'informations, veuillez consulter notre Politique de confidentialité.",
                            linkedCategory: "functionality"
                        },
                        {
                            title: "Cookies Analytiques",
                            description: "Ce site utilise des cookies analytiques pour comprendre l'utilisation du site et améliorer nos services. Ces cookies nous aident à recueillir des statistiques de visiteurs et à réaliser des analyses. Vous pouvez refuser l'utilisation de ces cookies dans les paramètres de votre navigateur. Pour plus d'informations, veuillez consulter notre Politique de confidentialité.",
                            linkedCategory: "analytics"
                        },
                        {
                            title: "Cookies Publicitaires",
                            description: "Ce site utilise des cookies publicitaires pour vous proposer de la publicité ciblée. Ces cookies collectent des informations sur vos activités de navigation pour adapter la publicité à vos intérêts. Vous pouvez refuser l'utilisation de ces cookies dans les paramètres de votre navigateur. Pour plus d'informations, veuillez consulter notre Politique de confidentialité.",
                            linkedCategory: "marketing"
                        },
                        {
                            title: "Plus d'informations",
                            description: "For any query in relation to my policy on cookies and your choices, please <a class=\"cc__link\" href=\"#yourdomain.com\">contact me</a>."
                        }
                    ]
                }
            }
        }
    }
}

export default {
    install: (app) => {
        app.config.globalProperties.$CookieConsent = CookieConsent;
        app.config.globalProperties.$CookieConsent.run(cookieConsentConfig);
    }
}