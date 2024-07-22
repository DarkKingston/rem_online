<script>
import { ref, watch } from 'vue';

export default {
    props: {
        label: {
            type: String,
            default: 'Цвет и иконка локации'
        },
        modelValue: {
            type: Object,
            default: () => ({})
        }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const selectedIcon = ref({
            id: 0,
            color: 0,
            fill: '#ccc'
        });
        const changeIcon = ref(false);

        const icons = ref([
            { key: 1, id: 0, color: 0, fill: '#ccc' },
            { key: 2, id: 0, color: 1, fill: '#d70000' },
            { key: 3, id: 0, color: 2, fill: '#f7c000' },
            { key: 4, id: 0, color: 3, fill: '#29b777' },
            { key: 5, id: 0, color: 4, fill: '#0099e8' },
            { key: 6, id: 0, color: 5, fill: '#3e4eb8' },
            { key: 7, id: 0, color: 6, fill: '#8f19ac' },
            { key: 8, id: 0, color: 7, fill: '#616161' },
            { key: 9, id: 0, color: 8, fill: '#7884cd' },
            { key: 10, id: 0, color: 9, fill: '#f75002' },
            { key: 10, id: 0, color: 10, fill: '#e87c70' },
            { key: 12, id: 0, color: 11, fill: '#008140' },

            { key: 13, id: 1, color: 0, fill: '#ccc' },
            { key: 14, id: 1, color: 1, fill: '#d70000' },
            { key: 15, id: 1, color: 2, fill: '#f7c000' },
            { key: 16, id: 1, color: 3, fill: '#29b777' },
            { key: 17, id: 1, color: 4, fill: '#0099e8' },
            { key: 18, id: 1, color: 5, fill: '#3e4eb8' },
            { key: 19, id: 1, color: 6, fill: '#8f19ac' },
            { key: 20, id: 1, color: 7, fill: '#616161' },
            { key: 21, id: 1, color: 8, fill: '#7884cd' },
            { key: 22, id: 1, color: 9, fill: '#f75002' },
            { key: 23, id: 1, color: 10, fill: '#e87c70' },
            { key: 24, id: 1, color: 11, fill: '#008140' },

            { key: 25, id: 2, color: 0, fill: '#ccc' },
            { key: 26, id: 2, color: 1, fill: '#d70000' },
            { key: 27, id: 2, color: 2, fill: '#f7c000' },
            { key: 28, id: 2, color: 3, fill: '#29b777' },
            { key: 29, id: 2, color: 4, fill: '#0099e8' },
            { key: 30, id: 2, color: 5, fill: '#3e4eb8' },
            { key: 31, id: 2, color: 6, fill: '#8f19ac' },
            { key: 32, id: 2, color: 7, fill: '#616161' },
            { key: 33, id: 2, color: 8, fill: '#7884cd' },
            { key: 34, id: 2, color: 9, fill: '#f75002' },
            { key: 35, id: 2, color: 10, fill: '#e87c70' },
            { key: 36, id: 2, color: 11, fill: '#008140' },

            { key: 37, id: 3, color: 0, fill: '#ccc' },
            { key: 38, id: 3, color: 1, fill: '#d70000' },
            { key: 39, id: 3, color: 2, fill: '#f7c000' },
            { key: 40, id: 3, color: 3, fill: '#29b777' },
            { key: 41, id: 3, color: 4, fill: '#0099e8' },
            { key: 42, id: 3, color: 5, fill: '#3e4eb8' },
            { key: 43, id: 3, color: 6, fill: '#8f19ac' },
            { key: 44, id: 3, color: 7, fill: '#616161' },
            { key: 45, id: 3, color: 8, fill: '#7884cd' },
            { key: 46, id: 3, color: 9, fill: '#f75002' },
            { key: 47, id: 3, color: 10, fill: '#e87c70' },
            { key: 48, id: 3, color: 11, fill: '#008140' },
        ]);

        const selectIcon = (icon) => {
            selectedIcon.value = { ...icon };
            emit('update:modelValue', { icon: icon.id, color: icon.color, fill: icon.fill });
            changeIconFunc();
        };

        function changeIconFunc(){
            changeIcon.value = !changeIcon.value
        }

        watch(() => props.modelValue, (newValue) => {
            const foundIcon = icons.value.find(icon => icon.id === newValue.iconId);
            if (foundIcon) {
                selectedIcon.value = { ...foundIcon };
            }
        }, { immediate: true });

        return {
            selectedIcon,
            icons,
            selectIcon,
            changeIconFunc,
            changeIcon
        };
    }
};
</script>

<template>
    <div style="position:relative;">
        <div class="label">{{ label }}</div>
        <div class="current_icon" @click="changeIconFunc">
            <div class="icon-row" v-if="selectedIcon.id == 0">
                <svg xmlns="http://www.w3.org/2000/svg" :fill="selectedIcon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-0-0"><path d="M8 0Q6.344 0 4.89.625a8 8 0 0 0-2.562 1.719A8 8 0 0 0 .625 4.89 7.8 7.8 0 0 0 0 8q0 1.656.625 3.11a8.2 8.2 0 0 0 1.703 2.562 8.2 8.2 0 0 0 2.563 1.703A7.8 7.8 0 0 0 8 16q1.656 0 3.11-.625a8 8 0 0 0 2.546-1.703 8 8 0 0 0 1.719-2.563A7.8 7.8 0 0 0 16 8q0-1.656-.625-3.11a7.9 7.9 0 0 0-1.719-2.546A7.9 7.9 0 0 0 11.11.625 7.8 7.8 0 0 0 8 0m0 14q-1.25 0-2.328-.469A6.2 6.2 0 0 1 3.75 12.25a6.2 6.2 0 0 1-1.281-1.922A5.8 5.8 0 0 1 2 8q0-1.25.469-2.328a6.02 6.02 0 0 1 3.203-3.203A5.8 5.8 0 0 1 8 2q1.25 0 2.328.469a5.9 5.9 0 0 1 1.906 1.297 5.9 5.9 0 0 1 1.297 1.906Q14.001 6.75 14 8q0 1.25-.469 2.328a6.02 6.02 0 0 1-3.203 3.203A5.8 5.8 0 0 1 8 14M5 8q0-1.25.875-2.125A2.9 2.9 0 0 1 8 5q1.25 0 2.125.875C11 6.75 11 7.167 11 8s-.292 1.542-.875 2.125A2.9 2.9 0 0 1 8 11a2.9 2.9 0 0 1-2.125-.875A2.9 2.9 0 0 1 5 8"></path></svg>
            </div>
            <div class="icon-row" v-if="selectedIcon.id == 1">
                <svg xmlns="http://www.w3.org/2000/svg" :fill="selectedIcon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-1-0"><path d="M2 2v12h12V2zM0 0h16v16H0zm5 5h6v6H5z"></path></svg>
            </div>
            <div class="icon-row" v-if="selectedIcon.id == 2">
                <svg xmlns="http://www.w3.org/2000/svg" :fill="selectedIcon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-2-0"><path d="M8 0Q6.344 0 4.89.625a8.3 8.3 0 0 0-2.546 1.734A8.2 8.2 0 0 0 .625 4.891 7.8 7.8 0 0 0 0 8q0 1.656.625 3.11.64 1.452 1.719 2.546a8.4 8.4 0 0 0 2.547 1.719A7.8 7.8 0 0 0 8 16q1.656 0 3.11-.625 1.452-.64 2.53-1.719a8.3 8.3 0 0 0 1.735-2.547A7.8 7.8 0 0 0 16 8q0-1.656-.625-3.11a8.1 8.1 0 0 0-1.734-2.53A8.1 8.1 0 0 0 11.109.624 7.8 7.8 0 0 0 8 0m0 2h.594L2 8.594V8q0-1.235.469-2.328a6.2 6.2 0 0 1 1.297-1.906 6.2 6.2 0 0 1 1.906-1.297A5.85 5.85 0 0 1 8 2m-5.297 8.797 8.094-8.094q.672.375 1.203.86a5.7 5.7 0 0 1 1 1.14L4.703 13a6.4 6.4 0 0 1-1.156-.984 7.4 7.4 0 0 1-.844-1.22ZM8 14q-.375 0-.703-.063a42 42 0 0 1-.703-.14l7.203-7.203q.078.375.14.703T14 8q0 1.234-.469 2.328a6.2 6.2 0 0 1-1.297 1.906 6.2 6.2 0 0 1-1.906 1.297A5.85 5.85 0 0 1 8 14"></path></svg>
            </div>
            <div class="icon-row" v-if="selectedIcon.id == 3">
                <svg xmlns="http://www.w3.org/2000/svg" :fill="selectedIcon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-3-0"><path d="M0 0v16h16V0zm2 8.406L8.406 2h4.188L2 12.594zm12-5v4.188L7.594 14H3.406zM5.594 2 2 5.594V2zm4.812 12L14 10.406V14z"></path></svg>
            </div>
        </div>
        <div class="icon-grid" :class="{active: changeIcon}">
            <div v-for="icon in icons" :key="icon.key" class="icon-container" @click="selectIcon(icon)">
                <div class="icon-row" v-if="icon.id == 0">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="icon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-0-0"><path d="M8 0Q6.344 0 4.89.625a8 8 0 0 0-2.562 1.719A8 8 0 0 0 .625 4.89 7.8 7.8 0 0 0 0 8q0 1.656.625 3.11a8.2 8.2 0 0 0 1.703 2.562 8.2 8.2 0 0 0 2.563 1.703A7.8 7.8 0 0 0 8 16q1.656 0 3.11-.625a8 8 0 0 0 2.546-1.703 8 8 0 0 0 1.719-2.563A7.8 7.8 0 0 0 16 8q0-1.656-.625-3.11a7.9 7.9 0 0 0-1.719-2.546A7.9 7.9 0 0 0 11.11.625 7.8 7.8 0 0 0 8 0m0 14q-1.25 0-2.328-.469A6.2 6.2 0 0 1 3.75 12.25a6.2 6.2 0 0 1-1.281-1.922A5.8 5.8 0 0 1 2 8q0-1.25.469-2.328a6.02 6.02 0 0 1 3.203-3.203A5.8 5.8 0 0 1 8 2q1.25 0 2.328.469a5.9 5.9 0 0 1 1.906 1.297 5.9 5.9 0 0 1 1.297 1.906Q14.001 6.75 14 8q0 1.25-.469 2.328a6.02 6.02 0 0 1-3.203 3.203A5.8 5.8 0 0 1 8 14M5 8q0-1.25.875-2.125A2.9 2.9 0 0 1 8 5q1.25 0 2.125.875C11 6.75 11 7.167 11 8s-.292 1.542-.875 2.125A2.9 2.9 0 0 1 8 11a2.9 2.9 0 0 1-2.125-.875A2.9 2.9 0 0 1 5 8"></path></svg>
                </div>
                <div class="icon-row" v-if="icon.id == 1">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="icon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-1-0"><path d="M2 2v12h12V2zM0 0h16v16H0zm5 5h6v6H5z"></path></svg>
                </div>
                <div class="icon-row" v-if="icon.id == 2">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="icon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-2-0"><path d="M8 0Q6.344 0 4.89.625a8.3 8.3 0 0 0-2.546 1.734A8.2 8.2 0 0 0 .625 4.891 7.8 7.8 0 0 0 0 8q0 1.656.625 3.11.64 1.452 1.719 2.546a8.4 8.4 0 0 0 2.547 1.719A7.8 7.8 0 0 0 8 16q1.656 0 3.11-.625 1.452-.64 2.53-1.719a8.3 8.3 0 0 0 1.735-2.547A7.8 7.8 0 0 0 16 8q0-1.656-.625-3.11a8.1 8.1 0 0 0-1.734-2.53A8.1 8.1 0 0 0 11.109.624 7.8 7.8 0 0 0 8 0m0 2h.594L2 8.594V8q0-1.235.469-2.328a6.2 6.2 0 0 1 1.297-1.906 6.2 6.2 0 0 1 1.906-1.297A5.85 5.85 0 0 1 8 2m-5.297 8.797 8.094-8.094q.672.375 1.203.86a5.7 5.7 0 0 1 1 1.14L4.703 13a6.4 6.4 0 0 1-1.156-.984 7.4 7.4 0 0 1-.844-1.22ZM8 14q-.375 0-.703-.063a42 42 0 0 1-.703-.14l7.203-7.203q.078.375.14.703T14 8q0 1.234-.469 2.328a6.2 6.2 0 0 1-1.297 1.906 6.2 6.2 0 0 1-1.906 1.297A5.85 5.85 0 0 1 8 14"></path></svg>
                </div>
                <div class="icon-row" v-if="icon.id == 3">
                    <svg xmlns="http://www.w3.org/2000/svg" :fill="icon.fill" width="16" height="16" viewBox="0 0 16 16" class="m9FZB cDYtB pBLJp KKt0k mSPV3" data-cid="branch-icon-3-0"><path d="M0 0v16h16V0zm2 8.406L8.406 2h4.188L2 12.594zm12-5v4.188L7.594 14H3.406zM5.594 2 2 5.594V2zm4.812 12L14 10.406V14z"></path></svg>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.label {
    font-weight: bold;
    margin-bottom: 10px;
}
.current_icon {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    cursor: pointer;
}
.icon-grid {
    max-width: 302px;
    width: 302px;
    background: #fff;
    border: 1px solid #c9cbcc;
    border-radius: 4px;
    box-shadow: 0 3px 7px 0 hsla(0, 0%, 82%, .5);
    display: none;
    flex-wrap: wrap;
    left: 0;
    max-height: 50vh;
    min-width: 240px;
    padding: 8px 0;
    position: absolute;
    top: calc(100% + 2px);
    align-items: center;
    justify-content: center;
}
.icon-grid.active{
    display: flex;
    z-index: 5;
}
.icon-container {
    margin: 0 8px 8px 0;
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

</style>
