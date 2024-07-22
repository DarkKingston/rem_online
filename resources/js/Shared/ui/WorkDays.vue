<script>
import { ref, watch, toRefs } from 'vue';
import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';

export default {
    props: {
        label: String,
        modelValue: {
            type: Object,
            default: () => ({}),
        },
    },
    components:{
        flatPickr,
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const { modelValue } = toRefs(props);
        const days = ref([
            { name: 'понедельник', enabled: true, startTime: '09:00', endTime: '18:00' },
            { name: 'вторник', enabled: true, startTime: '09:00', endTime: '18:00' },
            { name: 'среда', enabled: true, startTime: '09:00', endTime: '18:00' },
            { name: 'четверг', enabled: true, startTime: '09:00', endTime: '18:00' },
            { name: 'пятница', enabled: true, startTime: '09:00', endTime: '18:00' },
            { name: 'суббота', enabled: false, startTime: '09:00', endTime: '18:00' },
            { name: 'воскресенье', enabled: false, startTime: '09:00', endTime: '18:00' },
        ]);
        const config = ref({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        watch(modelValue, (newValue) => {
            days.value = newValue.days || days.value;
        }, { immediate: true, deep: true });

        watch(days, (newDays) => {
            emit('update:modelValue', { days: newDays });
        }, { deep: true });

        return {
            days,
            config
        };
    },
};
</script>

<template>
    <div>
        <div class="label" v-if="label">{{ label }}</div>
        <div v-for="(day, index) in days" :key="index" class="day-row">
            <div class="day_action">
                <div class="checkbox">
                    <input type="checkbox" v-model="day.enabled" :id="day.name" />
                    <label :for="day.name"></label>
                </div>
                <div class="title_day">{{ day.name }}</div>
            </div>
            <div class="picker" v-if="day.enabled">
                <div class="picker_ico">
                    <svg fill="#939699" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB Lr8ZQ mSPV3"><path d="M10.4 7.2H8.8V4a.8.8 0 1 0-1.6 0v4a.8.8 0 0 0 .8.8h2.4a.8.8 0 1 0 0-1.6M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m0 14.4A6.4 6.4 0 1 1 8 1.6a6.4 6.4 0 0 1 0 12.8"></path></svg>
                </div>
                <flat-pickr
                    v-model="day.startTime"
                    :config="config"
                />
            </div>
            <span v-if="day.enabled">—</span>
            <div class="picker" v-if="day.enabled">
                <div class="picker_ico">
                    <svg fill="#939699" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="m9FZB Lr8ZQ mSPV3"><path d="M10.4 7.2H8.8V4a.8.8 0 1 0-1.6 0v4a.8.8 0 0 0 .8.8h2.4a.8.8 0 1 0 0-1.6M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m0 14.4A6.4 6.4 0 1 1 8 1.6a6.4 6.4 0 0 1 0 12.8"></path></svg>
                </div>
                <flat-pickr
                    v-model="day.endTime"
                    :config="config"
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.day-row {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

input[type="time"] {
    border: 1px solid var(--color-white-border);
    border-radius: 3px;
    box-shadow: inset 0 1px 1px rgba(var(--color-rgb-black), .075);
    color: var(--color-black-gray);
    display: block;
    font-size: 13px;
    height: 34px;
    line-height: 13px;
    padding: 6px 5px;
    width: fit-content;
    cursor: pointer;
}
span{
    margin: 0 8px;
}
.label {
    color: var(--color-main);
    display: block;
    margin-bottom: 0;
    font-weight: 700;
    font-size: 12px;
}
.day_action{
    display: flex;
    align-items: center;
    width: 105px;
    height: 34px;
    margin-right: 20px;
}
.picker{
    position: relative;
}
.flatpickr-input{
    cursor: pointer;
    border: 1px solid var(--color-white-border);
    border-radius: 3px;
    box-shadow: inset 0 1px 1px rgba(var(--color-rgb-black), .075);
    color: var(--color-black-gray);
    display: block;
    font-size: 13px;
    height: 34px;
    line-height: 13px;
    padding: 6px 10px 6px 36px;
    width: 95px;
}
.picker_ico{
    align-items: center;
    display: flex;
    height: 34px;
    padding: 0 8px 0 13px;
    pointer-events: none;
    position: absolute;
}
</style>
