<script setup>
import { computed } from 'vue';
import { useLanguage } from '../../stores/language';
import { useMenu } from '../../stores/menu';
import { Head } from '@inertiajs/vue3'

import NavMenu from "../../Shared/menu/NavMenu";

const languageStore = useLanguage();
const menuStore = useMenu();
const currentLang = computed(() => languageStore.lang);

const content = computed(() => languageStore.langContent);

</script>

<template>
    <Head :title="content.general"/>
    <main class="content content_main_sidebar" :class="{active: menuStore.menu}">
        <NavMenu :title="content.general"/>
        <div class="container_main">
            <div style="margin-bottom: 12px;">
                Список всех локаций компании. Каждой локации можно присвоить уникальный код и цвет.
            </div>
            <div class="table_grid">
                <div class="table_btn">
                    <button data-cid="table-btn-add" class="btn_main" type="button">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" class="m9FZB RKh3m XpnWz _CD1y Lf9ms"><path d="M8 0a1.6 1.6 0 0 0-1.6 1.6v4.8H1.6a1.6 1.6 0 0 0 0 3.2h4.8v4.8a1.6 1.6 0 1 0 3.2 0V9.6h4.8a1.6 1.6 0 1 0 0-3.2H9.6V1.6A1.6 1.6 0 0 0 8 0" clip-rule="evenodd"></path></svg>
                        </span>
                        Локация
                    </button>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>

</style>
