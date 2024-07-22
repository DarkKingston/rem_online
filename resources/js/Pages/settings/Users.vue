<script>
import { computed, ref } from 'vue';
import { useLanguage } from '../../stores/language';
import { useMenu } from '../../stores/menu';
import { Head } from '@inertiajs/vue3'
import UserTable from "../../Shared/tables/UserTable";
import NavMenu from "../../Shared/menu/NavMenu";
import {useStatePopupUsers} from "../../stores/popups";
import Users from "../../Shared/popups/Users";
export default {
    components:{
        NavMenu,
        UserTable,
        Head,
        Users
    },
    setup(){
        const languageStore = useLanguage();
        const menuStore = useMenu();
        const currentLang = computed(() => languageStore.lang);
        const content = computed(() => languageStore.langContent);
        const activeTab = ref('employees');
        const toggledPopup = ref(false);
        const statePopupUsers = useStatePopupUsers();
        const popupUsers = computed(() => statePopupUsers.statePopupUsers);

        function togglePopup(){
            statePopupUsers.$inactivePopup();
        }

        function handleClick(){
            togglePopup();
        }

        function setActiveTab(tab) {
            activeTab.value = tab;
        }

        return{
            setActiveTab,
            activeTab,
            content,
            currentLang,
            menuStore,
            languageStore,
            togglePopup,
            handleClick,
            toggledPopup,
            popupUsers

        }
    }
}
</script>

<template>
    <Head :title="content.users"/>
    <main class="content content_main_sidebar" :class="{active: menuStore.menu}">
        <NavMenu :title="content.users"/>
        <div class="container_main">

            <div class="tabs">
                <div
                    class="tab_item"
                    :class="{ active: activeTab === 'employees' }"
                    @click="setActiveTab('employees')"
                >
                    Сотрудники
                </div>
                <div
                    class="tab_item"
                    :class="{ active: activeTab === 'roles' }"
                    @click="setActiveTab('roles')"
                >
                    Роли
                </div>
                <div
                    class="tab_item"
                    :class="{ active: activeTab === 'salaryRules' }"
                    @click="setActiveTab('salaryRules')"
                >
                    Правила расчета зарплаты
                </div>
            </div>

            <div class="tab_content">
                <div v-if="activeTab === 'employees'">
                    <div style="margin-bottom: 12px;">
                        Каждый сотрудник имеет свой логин и пароль для входа в RemOnline
                    </div>
                    <UserTable/>
                </div>
                <div v-if="activeTab === 'roles'">
                    <p>Контент для таба "Роли"</p>
                </div>
                <div v-if="activeTab === 'salaryRules'">
                    <p>Контент для таба "Правила расчета зарплаты"</p>
                </div>
            </div>

        </div>
    </main>

    <div class="popup" v-if="popupUsers" :class="{ active: popupUsers }">
        <div class="popup_right popup-680"  v-click-outside="handleClick">
            <div class="popup_content">
                <div class="popup_header">
                    <div class="popup_header_title">Новый сотрудник</div>
                    <div class="popup_close" @click="togglePopup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB pBLJp Lr8ZQ Lf9ms"><path fill-rule="evenodd" d="M2.877 1.123a1.216 1.216 0 0 0-1.754 0 1.216 1.216 0 0 0 0 1.754L5.896 7.65l-4.773 4.773a1.217 1.217 0 0 0 0 1.754 1.217 1.217 0 0 0 1.754 0L7.65 9.404l4.773 4.773a1.217 1.217 0 0 0 1.754 0 1.217 1.217 0 0 0 0-1.754L9.404 7.65l4.773-4.773a1.217 1.217 0 0 0 0-1.754 1.217 1.217 0 0 0-1.754 0L7.65 5.896z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>

                <Users/>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
