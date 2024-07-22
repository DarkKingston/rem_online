<script>
import {computed, ref} from 'vue';
import { useStatePopupUsers } from '../../stores/popups';
export default {
    components:{
        useStatePopupUsers
    },
    setup(){
        const tableHead = ref([
            {
                value: 'Сотрудник',
                type: 'employee',
                show: true
            },
            {
                value: 'Дата начала работы',
                type: 'start_work',
                show: true
            },
            {
                value: 'Должность',
                type: 'position',
                show: true
            },
            {
                value: 'Логин',
                type: 'login',
                show: true
            },
            {
                value: 'Email',
                type: 'email',
                show: true
            },
            {
                value: 'Телефон',
                type: 'phone',
                show: true
            },
            {
                value: 'Роль',
                type: 'role',
                show: true
            },
            {
                value: 'Имя сотрудника',
                type: 'name',
                show: true
            },
            {
                value: 'Примечание',
                type: 'notes',
                show: true
            },
            {
                value: 'Баланс, L',
                type: 'balance',
                show: true
            }
    ]);
        const tableUsers = ref([
            {
                employee: 'Ivan',
                start_work: '12 июл. 2024',
                position: '',
                login: 'jjjemej927',
                email: 'jjjemej927@carsapure.com',
                phone: '+373 (12) 312-312',
                role: 'Полный доступ',
                name: '',
                notes: '',
                balance: '0',
            },
            {
                employee: 'Dorin',
                start_work: '12 июл. 2024',
                position: 'Full-stack dev',
                login: 'DarkKingston',
                email: 'bprocrm@gmail.com',
                phone: '+37369090909',
                role: 'Полный доступ',
                name: 'Administrators',
                notes: 'test',
                balance: '9999',
            },
    ]);
        const isActiveSettings = ref(false);
        const statePopupUsers = useStatePopupUsers();

        function toggleSettings(){
            isActiveSettings.value = !isActiveSettings.value
        }

        function handleClick(){
            isActiveSettings.value = false
        }

        function changeStatePopup(){
            statePopupUsers.$activePopup();
        }

        return{
            tableHead,
            tableUsers,
            toggleSettings,
            handleClick,
            isActiveSettings,
            changeStatePopup
        }
    }
}
</script>

<template>
    <div class="table_btns">
        <div class="table_btn">
            <button data-cid="table-btn-add" class="btn_main" type="button">
                <span class="d-flex align-center">
                    <font-awesome-icon :icon="['fas', 'envelope']" style="width: 14px;height: 14px;"/>
                </span>
                Пригласить сотрудника
            </button>
            <button data-cid="table-btn-add" class="btn_main btn_border" type="button" @click="changeStatePopup">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" class="m9FZB RKh3m XpnWz _CD1y Lf9ms"><path d="M8 0a1.6 1.6 0 0 0-1.6 1.6v4.8H1.6a1.6 1.6 0 0 0 0 3.2h4.8v4.8a1.6 1.6 0 1 0 3.2 0V9.6h4.8a1.6 1.6 0 1 0 0-3.2H9.6V1.6A1.6 1.6 0 0 0 8 0" clip-rule="evenodd"></path></svg>
                </span>
                Сотрудник
            </button>
        </div>
        <button type="button" class="table_settings" v-click-outside="handleClick">
            <div class="btn_main btn_border" @click="toggleSettings">
                <span class="btn_settings_ico">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB pBLJp wneXk Lf9ms"><path d="m15.456 6.04-1.512-.504.712-1.424a.8.8 0 0 0-.152-.912L12.8 1.496a.8.8 0 0 0-.92-.152l-1.424.712L9.952.544A.8.8 0 0 0 9.2 0H6.8a.8.8 0 0 0-.76.544l-.504 1.512-1.424-.712a.8.8 0 0 0-.912.152L1.496 3.2a.8.8 0 0 0-.152.92l.712 1.424-1.512.504A.8.8 0 0 0 0 6.8v2.4a.8.8 0 0 0 .544.76l1.512.504-.712 1.424a.8.8 0 0 0 .152.912L3.2 14.504a.8.8 0 0 0 .92.152l1.424-.712.504 1.512a.8.8 0 0 0 .76.544h2.4a.8.8 0 0 0 .76-.544l.504-1.512 1.424.712a.8.8 0 0 0 .904-.152l1.704-1.704a.8.8 0 0 0 .152-.92l-.712-1.424 1.512-.504A.8.8 0 0 0 16 9.2V6.8a.8.8 0 0 0-.544-.76M14.4 8.624l-.96.32a1.6 1.6 0 0 0-.928 2.256l.456.912-.88.88-.888-.48a1.6 1.6 0 0 0-2.232.928l-.32.96H7.376l-.32-.96a1.6 1.6 0 0 0-2.256-.928l-.912.456-.88-.88.48-.888a1.6 1.6 0 0 0-.928-2.256l-.96-.32V7.376l.96-.32A1.6 1.6 0 0 0 3.488 4.8l-.456-.888.88-.88.888.456a1.6 1.6 0 0 0 2.256-.928l.32-.96h1.248l.32.96a1.6 1.6 0 0 0 2.256.928l.912-.456.88.88-.48.888a1.6 1.6 0 0 0 .928 2.232l.96.32zM8 4.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4m0 4.8a1.6 1.6 0 1 1 0-3.2 1.6 1.6 0 0 1 0 3.2"></path></svg>
                </span>
                <span class="btn_arrow"   :class="{active: isActiveSettings}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="none" viewBox="0 0 8 8" class="m9FZB Vi_BC Spq3m nNSug u_w_7 OvE5W Lf9ms"><path d="M.207 5.074 3.47 1.85a.76.76 0 0 1 1.08 0l3.225 3.225a.76.76 0 1 1-1.073 1.08L4.01 3.462 1.317 6.154a.76.76 0 0 1-1.072 0 .76.76 0 0 1-.038-1.08"></path></svg>
                </span>
            </div>
            <div class="btn_content" :class="{active: isActiveSettings}">
                <div class="btn_content_item" v-for="(item, id) in tableHead" :key="id">
                    <div class="checkbox" v-if="id != 0">
                        <input type="checkbox" v-model="item.show" :id="item.type" />
                        <label :for="item.type"></label>
                    </div>
                    <div class="title_day" v-if="id != 0" :for="item.type">{{ item.value }}</div>
                </div>
            </div>
        </button>
    </div>

    <div class="table_user">
        <div class="table_user_head d-flex align-center">
            <div class="table_user_head_item" v-for="(item, idx) in tableHead" :key="idx" :class="{hidden: !item.show}">{{item.value}}</div>
        </div>
        <div class="table_user_body">
            <div class="table_user_body_row d-flex align-center" v-for="(user, idx) in tableUsers" :key="idx">
                <div class="table_user_body_item" v-for="(header, hIdx) in tableHead" :key="hIdx" :class="{hidden: !header.show}">
                    {{ user[header.type] }}
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>
