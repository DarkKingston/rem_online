<script>
import AppHeader from './layout_components/AppHeader';
import AppFooter from './layout_components/AppFooter';
export default {
    components: {
        AppHeader,
        AppFooter
    },
    setup() {

        return {};
    },
};
</script>

<template>
    <section className="content">
        <AppHeader/>
        <main className="main">
            <slot></slot>
        </main>
        <AppFooter/>
    </section>
</template>

