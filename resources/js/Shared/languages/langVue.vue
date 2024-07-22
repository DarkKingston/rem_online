<script>
import { ref, computed, onMounted } from 'vue';
import { useLanguage } from '../../stores/language';
import { langContent } from '../../language.js';
export default {
  name: "langVue",
  setup() {
    const langsArray = ref({'EN':'English', 'RO':'Romana', 'RU':'Русский'});
    const dropActive = ref(false);
    const languageStore = useLanguage();

    onMounted(() => {
      useLanguage();
    });

    const currentLang = computed(() => languageStore.lang);

    const changeLanguage = (lang, id) => {
      languageStore.changeLanguage(id);
      languageStore.changeLanguageContent(langContent[id]);
      currentLang.value = lang;
      changeState();
    };

    const changeState = () => {
      dropActive.value = !dropActive.value;
    };

    return {
      langsArray,
      dropActive,
      currentLang,
      changeLanguage,
      changeState
    };
  }
}
</script>


<template>
  <div class="lang_dropDown">
    <div class="lang_current btn" :class="{active: dropActive}" @click="changeState">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB pBLJp u_w_7 DMPP_ Lf9ms"><path fill-rule="evenodd" d="M1 .6c-.552 0-1 .474-1 1.06 0 .584.448 1.059 1 1.059h3.957c-.135 1.682-.59 3.22-1.27 4.371l-.083.138c-.437-.474-.605-.943-.604-1.33 0-.585-.446-1.06-.998-1.06C1.449 4.835 1 5.31 1 5.894c-.002 1.08.457 2.04 1.186 2.825-.403.242-.806.355-1.186.355-.552 0-1 .474-1 1.06 0 .584.448 1.058 1 1.058 1.075 0 2.066-.435 2.913-1.172.988.529 2.15.886 3.374 1.058l-1.2 2.862c-.225.535.002 1.16.507 1.398s1.096-.003 1.32-.537l.625-1.49h4.922l.625 1.49c.224.534.816.775 1.32.537.505-.237.732-.863.508-1.398l-4-9.534A1 1 0 0 0 11 3.778a1 1 0 0 0-.914.63L8.141 9.043c-1.053-.086-2.03-.327-2.847-.683l.09-.148c.9-1.525 1.44-3.464 1.58-5.494H8c.552 0 1-.475 1-1.06C9 1.074 8.552.6 8 .6zm10 6.846 1.572 3.747H9.428z" clip-rule="evenodd"></path></svg>
      <span>{{ langsArray[currentLang] }}</span>
      <div class="lang_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="none" viewBox="0 0 8 8" class="m9FZB Vi_BC Spq3m IzeEO u_w_7 OvE5W Lf9ms"><path d="M.207 5.074 3.47 1.85a.76.76 0 0 1 1.08 0l3.225 3.225a.76.76 0 1 1-1.073 1.08L4.01 3.462 1.317 6.154a.76.76 0 0 1-1.072 0 .76.76 0 0 1-.038-1.08"></path></svg>
      </div>
    </div>
    <div class="lang_content" :class="{active: dropActive}">
      <div class="lang_item" v-for="(lang, id) in langsArray" :key="id" @click="changeLanguage(lang, id)">
        {{ lang }}
      </div>
    </div>
  </div>
</template>

<style>
.lang_dropDown{
  position: relative;
}

.lang_arrow svg{
  transition: transform .3s, -webkit-transform .3s;
  width: 12px;
  height: 12px;
  transform: rotate(180deg);
  fill: #9A969B;
}
.lang_arrow{
  transition: 0.3s all;
}

.lang_current{
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #fff;
  border-color: #c9cbcc;
  color: #282e33;
  font-weight: 400;
}

.lang_current.active .lang_arrow{
  transform: rotate(-180deg);
  transition: 0.3s all;
}

.lang_current span{
  margin: 0 12px;
}

.lang_content{
  display: none;
  border-radius: 8px;
  font-size: 16px;
  line-height: 22px;
  max-width: 240px;
  padding: 8px 0;
  position: absolute;
  top: calc(100% + 2px);
  right: 0;
  z-index: 9;
  left: auto;
  background: #fff;
  border: 1px solid #c9cbcc;
  box-shadow: 0 3px 7px 0 hsla(0, 0%, 82%, .5);
  flex-direction: column;
  max-height: 50vh;
  min-width: 240px;
}
.lang_content.active{
  display: flex;
}
.lang_item{
  cursor: pointer;
  padding: 8px 12px;
}
.lang_item:hover {
  background-color: #edf4fb
}
</style>
