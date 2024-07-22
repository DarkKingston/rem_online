<script setup>
import { computed, ref } from 'vue';
import { useLanguage } from '../../stores/language';
import { useMenu } from '../../stores/menu';
import {Head} from "@inertiajs/vue3";
import NavMenu from "../../Shared/menu/NavMenu";
import Location from "../../Shared/popups/Location";
const languageStore = useLanguage();
const menuStore = useMenu();
const currentLang = computed(() => languageStore.lang);
const toggledPopup = ref(false);
const content = computed(() => languageStore.langContent);

function togglePopup(){
    toggledPopup.value = !toggledPopup.value
}

function handleClick(){
    togglePopup();
}

function savePopup(){

}
</script>

<template>
    <Head :title="content.location"/>
    <main class="content content_main_sidebar" :class="{active: menuStore.menu}">
        <NavMenu :title="content.location"/>
        <div class="container_main">
            <div style="margin-bottom: 12px;">
                Список всех локаций компании. Каждой локации можно присвоить уникальный код и цвет.
            </div>
            <div class="table_grid">
                <div class="table_btn">
                    <button data-cid="table-btn-add" class="btn_main" type="button"  @click="togglePopup">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" class="m9FZB RKh3m XpnWz _CD1y Lf9ms"><path d="M8 0a1.6 1.6 0 0 0-1.6 1.6v4.8H1.6a1.6 1.6 0 0 0 0 3.2h4.8v4.8a1.6 1.6 0 1 0 3.2 0V9.6h4.8a1.6 1.6 0 1 0 0-3.2H9.6V1.6A1.6 1.6 0 0 0 8 0" clip-rule="evenodd"></path></svg>
                        </span>
                        Локация
                    </button>
                </div>

                <div class="table">
                    <div class="table_item">
                        <div class="table_head">
                            <div class="table_header_cell" style="width: 32px;">

                            </div>
                            <div class="table_header_cell" style="width: 300px;">
                                Название
                            </div>
                            <div class="table_header_cell" style="width: 100%;">
                                Адрес
                            </div>
                        </div>
                    </div>
                    <div class="table_item">
                        <div class="table_body">
                            <div class="table_body_item" style="width: 32px;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#d70000" width="16" height="16" viewBox="0 0 16 16" class="m9FZB h-mr-7 uxtT5 WZ2cV mSPV3" data-cid="table-body-branch-title"><path d="M8 0Q6.344 0 4.89.625a8 8 0 0 0-2.562 1.719A8 8 0 0 0 .625 4.89 7.8 7.8 0 0 0 0 8q0 1.656.625 3.11a8.2 8.2 0 0 0 1.703 2.562 8.2 8.2 0 0 0 2.563 1.703A7.8 7.8 0 0 0 8 16q1.656 0 3.11-.625a8 8 0 0 0 2.546-1.703 8 8 0 0 0 1.719-2.563A7.8 7.8 0 0 0 16 8q0-1.656-.625-3.11a7.9 7.9 0 0 0-1.719-2.546A7.9 7.9 0 0 0 11.11.625 7.8 7.8 0 0 0 8 0m0 14q-1.25 0-2.328-.469A6.2 6.2 0 0 1 3.75 12.25a6.2 6.2 0 0 1-1.281-1.922A5.8 5.8 0 0 1 2 8q0-1.25.469-2.328a6.02 6.02 0 0 1 3.203-3.203A5.8 5.8 0 0 1 8 2q1.25 0 2.328.469a5.9 5.9 0 0 1 1.906 1.297 5.9 5.9 0 0 1 1.297 1.906Q14.001 6.75 14 8q0 1.25-.469 2.328a6.02 6.02 0 0 1-3.203 3.203A5.8 5.8 0 0 1 8 14M5 8q0-1.25.875-2.125A2.9 2.9 0 0 1 8 5q1.25 0 2.125.875C11 6.75 11 7.167 11 8s-.292 1.542-.875 2.125A2.9 2.9 0 0 1 8 11a2.9 2.9 0 0 1-2.125-.875A2.9 2.9 0 0 1 5 8"></path></svg>
                            </div>
                            <div class="table_body_item" style="width: 300px;">
                                My location
                            </div>
                            <div class="table_body_item" style="width: 100%;">
                                My address str.99
                            </div>
                        </div>
                    </div>
                    <div class="table_footer">
                        <div class="table_footer_span">
                            Всего - <span>1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="popup" v-if="toggledPopup" :class="{ active: toggledPopup }">
        <div class="popup_right"  v-click-outside="handleClick">
            <div class="popup_content">
                <div class="popup_header">
                    <div class="popup_header_title">Новая локация</div>
                    <div class="popup_close" @click="togglePopup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB pBLJp Lr8ZQ Lf9ms"><path fill-rule="evenodd" d="M2.877 1.123a1.216 1.216 0 0 0-1.754 0 1.216 1.216 0 0 0 0 1.754L5.896 7.65l-4.773 4.773a1.217 1.217 0 0 0 0 1.754 1.217 1.217 0 0 0 1.754 0L7.65 9.404l4.773 4.773a1.217 1.217 0 0 0 1.754 0 1.217 1.217 0 0 0 0-1.754L9.404 7.65l4.773-4.773a1.217 1.217 0 0 0 0-1.754 1.217 1.217 0 0 0-1.754 0L7.65 5.896z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>

                <Location/>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
