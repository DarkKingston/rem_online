<script>
import logo from '../Shared/logos/logoBigVue.vue';
import languages from '../Shared/languages/langVue.vue';
import recoveryForm from '../Shared/forms/recoveryFormVue.vue';
import LayoutLogin from '../Shared/LayoutLogin.vue';
export default{
    components:{
        logo, languages, recoveryForm
    },
    layout:LayoutLogin
}
</script>

<template>
    <header>
      <logo/>
      <languages/>
    </header>
    <main>
      <recoveryForm/>
    </main>
</template>

<style>
  header{
    align-items: center;
    background: 0 0;
    display: flex;
    justify-content: space-between;
    padding: 20px calc(32px - 100vw + 100%) 20px 32px;
    position: absolute;
    width: 100%;
    z-index: 5;
  }
</style>
