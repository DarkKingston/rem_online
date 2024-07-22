<script>
import MenuVue from './menu/MenuVue'
import { useMenu } from '../stores/menu';
import { ref, computed, onMounted } from 'vue';
import { useLanguage } from '../stores/language';
import { langContent } from '../language.js';
import vClickOutside from 'click-outside-vue3'

export default{
    components:{
        MenuVue
    },
    directives: {
        clickOutside: vClickOutside.directive
    },
    setup(){
        const menuStore = useMenu();
        const languageStore = useLanguage();
        const currentLang = computed(() => languageStore.lang);
        let toggledLang = ref(false);

        const toggleLang = () => {
            toggledLang.value = !toggledLang.value;
        }

        const changeLanguage = (lang) => {
            languageStore.changeLanguage(lang);
            languageStore.changeLanguageContent(langContent[lang]);
            currentLang.value = lang;
            toggleLang();
        };

        const handleClickOutside = () => {
            toggledLang.value = false;
        }

        return{
            menuStore,
            currentLang,
            toggleLang,
            toggledLang,
            changeLanguage,
            handleClickOutside
        }
    }
}
</script>

<template>
    <div>
        <nav className="nav_menu">
            <MenuVue/>
        </nav>
        <div class="content_admin">
            <slot></slot>
            <footer class="content_main_sidebar footer" :class="{active: menuStore.menu}">
                <div class="container_main">
                    <div class="footer_label">
                        Demo (ID 147664)
                    </div>
                    <div class="footer_info">
                        RemOnline © 2012-2024 | <a href="mailto:support@remonline.app">support@remonline.app</a>
                        <div class="footer_langs"  v-click-outside="handleClickOutside">
                            <div class="footer_current d-flex align-center" @click="toggleLang">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB IzeEO Lr8ZQ n9mWN Lf9ms"><path fill-rule="evenodd" d="M1 .6c-.552 0-1 .474-1 1.06 0 .584.448 1.059 1 1.059h3.957c-.135 1.682-.59 3.22-1.27 4.371l-.083.138c-.437-.474-.605-.943-.604-1.33 0-.585-.446-1.06-.998-1.06C1.449 4.835 1 5.31 1 5.894c-.002 1.08.457 2.04 1.186 2.825-.403.242-.806.355-1.186.355-.552 0-1 .474-1 1.06 0 .584.448 1.058 1 1.058 1.075 0 2.066-.435 2.913-1.172.988.529 2.15.886 3.374 1.058l-1.2 2.862c-.225.535.002 1.16.507 1.398s1.096-.003 1.32-.537l.625-1.49h4.922l.625 1.49c.224.534.816.775 1.32.537.505-.237.732-.863.508-1.398l-4-9.534A1 1 0 0 0 11 3.778a1 1 0 0 0-.914.63L8.141 9.043c-1.053-.086-2.03-.327-2.847-.683l.09-.148c.9-1.525 1.44-3.464 1.58-5.494H8c.552 0 1-.475 1-1.06C9 1.074 8.552.6 8 .6zm10 6.846 1.572 3.747H9.428z" clip-rule="evenodd"></path></svg></span>
                                <span v-if="currentLang == 'RU'">
                                    Руский
                                </span>
                                <span v-if="currentLang == 'EN'">
                                    English
                                </span>
                                <span v-if="currentLang == 'RO'">
                                    Romana
                                </span>
                            </div>
                            <div class="footer_lang_change" :class="{active: toggledLang}">
                                <div class="footer_lang_change_item" @click="changeLanguage('RU')">Руский</div>
                                <div class="footer_lang_change_item" @click="changeLanguage('EN')">English</div>
                                <div class="footer_lang_change_item" @click="changeLanguage('RO')">Romana</div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

