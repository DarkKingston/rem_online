
<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import { useLanguage } from '../../stores/language';
import { useMenu } from '../../stores/menu';
import { Link } from '@inertiajs/inertia-vue3';

const languageStore = useLanguage();
const menuStore = useMenu();
const currentLang = computed(() => languageStore.lang);
const content = computed(() => languageStore.langContent);
const activeClass = ref(null);

const logout = () => {
    authStore.logout();
    window.location.href = '/';
};

const { props } = usePage();

const isActive = (path) => {
    const currentRouteName = route().current();
    return route().current(path);
};
const menuIsActive = (name) => {
    let currentRouteName = route().current();
    return currentRouteName.split('.')[0] === name;
}

function toggleMenu(){
    menuStore.menu = !menuStore.menu;
}

function activeItem(event) {
    document.querySelectorAll('.menu_submenu_item').forEach((el) => {
        el.classList.remove('active');
    });
    if (activeClass.value) {
        activeClass.value.classList.remove('active');
    }

    const target = event.currentTarget;
    if (target !== activeClass.value) {
        target.classList.add('active');
        activeClass.value = target;
    } else {
        activeClass.value = null;
    }
}
</script>


<template>
    <div class="menu" :class="{'active': menuStore.menu}">
        <div class="general_menu_group">
          <Link :href="route('recovery')" class="sidebar-menu-link" :class="{ active: menuIsActive('recovery') }">
            <div class="company_img">
              <img class="Q0hIK fPb1U" src="https://storage.remonline.app/avatar/387072c956b04970a579b510122f0ad9.png?" alt="User avatar">
            </div>
          </Link>

          <Link :href="route('recovery')" class="sidebar-menu-link" :class="{ active: menuIsActive('recovery') }">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB lbEVe mSPV3"><path fill-rule="evenodd" d="m8.528.199 7.2 6.4A.8.8 0 0 1 15.2 8h-.8v7.2a.8.8 0 0 1-.8.801H2.4a.8.8 0 0 1-.8-.8V8H.8a.8.8 0 0 1-.53-1.4L7.47.199a.8.8 0 0 1 1.057 0ZM5.6 11.999v2.4h4.8V12a2.4 2.4 0 1 0-4.8 0Z" clip-rule="evenodd"></path></svg>
            <span v-if="!menuStore.menu">{{ content.company }}</span>
          </Link>
        </div>
        <div class="indicators_menu_group">

        </div>
        <div class="settings_menu_group">
            <Link :href="route('settings.general')" class="sidebar-menu-link" :class="{ active: menuIsActive('settings') }">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB lbEVe mSPV3"><g clip-path="url(#a)"><path fill-rule="evenodd" d="m15.456 6.04-1.512-.504.712-1.424a.8.8 0 0 0-.152-.912L12.8 1.496a.8.8 0 0 0-.92-.152l-1.424.712L9.952.544A.8.8 0 0 0 9.2 0H6.8a.8.8 0 0 0-.76.544l-.504 1.512-1.424-.712a.8.8 0 0 0-.912.152L1.496 3.2a.8.8 0 0 0-.152.92l.712 1.424-1.512.504A.8.8 0 0 0 0 6.8v2.4a.8.8 0 0 0 .544.76l1.512.504-.712 1.424a.8.8 0 0 0 .152.912L3.2 14.504a.8.8 0 0 0 .92.152l1.424-.712.504 1.512a.8.8 0 0 0 .76.544h2.4a.8.8 0 0 0 .76-.544l.504-1.512 1.424.712a.8.8 0 0 0 .904-.152l1.704-1.704a.8.8 0 0 0 .152-.92l-.712-1.424 1.512-.504A.8.8 0 0 0 16 9.2V6.8a.8.8 0 0 0-.544-.76M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6" clip-rule="evenodd"></path></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h16v16H0z"></path></clipPath></defs></svg>
                <span v-if="!menuStore.menu">{{ content.settings }}</span>
            </Link>
        </div>
    </div>
    <div class="menu_submenu">
        <div class="menu_submenu_box">
            <Link
                :href="route('settings.general')"
                class="menu_submenu_item"
                :class="{ active: isActive('settings.general') }"
                @click="activeItem($event)"
            >
                <span>Общие</span>
            </Link>
            <Link
                :href="route('settings.users')"
                class="menu_submenu_item"
                @click="activeItem($event)"
                :class="{ active: isActive('settings.users') }"
            >
                <span>Сотрудники</span>
            </LINK>
            <Link :href="route('settings.branches')" @click="activeItem($event)" class="menu_submenu_item"  :class="{ active: isActive('settings.branches') }"><span>Локации</span></Link>
            <div class="menu_submenu_item" @click="activeItem($event)"><span>Склады</span></div>
        </div>
        <div class="menu_submenu_box">
            <div class="menu_submenu_item" @click="activeItem($event)"><span>Статусы</span></div>
            <div class="menu_submenu_item" @click="activeItem($event)"><span>Тэги</span></div>
            <div class="menu_submenu_item" @click="activeItem($event)"><span>Оповещения</span></div>
        </div>
    </div>
    <div class="menu_toggle" @click="toggleMenu"  :class="{'active': menuStore.menu}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB W6JVk RKh3m XpnWz Lf9ms" data-cid="collapser"><path d="M3.74 7.422 11.077.234a.8.8 0 0 1 .272-.172.8.8 0 0 1 .32-.062q.176 0 .335.063a.8.8 0 0 1 .256.171.8.8 0 0 1 .176.266.75.75 0 0 1 .064.313.8.8 0 0 1-.064.312.8.8 0 0 1-.176.25L5.482 8l6.778 6.625a.8.8 0 0 1 .176.266.75.75 0 0 1 0 .61.8.8 0 0 1-.176.265.8.8 0 0 1-.256.171.9.9 0 0 1-.335.063.8.8 0 0 1-.304-.063.8.8 0 0 1-.272-.171L3.74 8.578a.8.8 0 0 1-.176-.25A.9.9 0 0 1 3.5 8q0-.172.064-.313a.8.8 0 0 1 .176-.265"></path></svg>
    </div>
</template>

<style scoped>
  .company_img{
    padding-left: 24px;
    display: flex;
    justify-content: center;
    min-width: 32px;
    position: relative;
  }
  .company_img img{

    height: 60px;
    width: 60px;
    border-radius: 50%;
    overflow: hidden;
    object-fit: cover;
  }
</style>
