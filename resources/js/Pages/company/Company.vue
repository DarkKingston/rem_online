<script setup>
import { computed } from 'vue';
import { useLanguage } from '../../stores/language';

const languageStore = useLanguage();
const currentLang = computed(() => languageStore.lang);

const content = computed(() => languageStore.langContent);

</script>

<template>
  <div>
    <div class="header">
      <div class="header_item d-flex align-center">
        <div class="header_title color_main regular">
          {{ content.company }}
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .header{
    align-items: center;
    background: #fff;
    -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 32px;
    min-height: 52px;
    padding: 8px 16px 0;
    position: relative;
    z-index: 2001;
  }
  .header_title{
    font-size: 24px;
    line-height: 28px;
    margin-bottom: 8px;
    margin-right: 8px;
  }
</style>
