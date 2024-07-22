<script>
export default {
    props: {
        label: {
            type: String,
            default: 'Тип заказа по умолчанию'
        },
        options: {
            type: Array,
            required: true
        },
        size: {
            type: Number,
            default: 100
        },
        modelValue: {
            type: String,
            default: ''
        }
    },
    emits: ['update:modelValue'],
    computed: {
        selected: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit('update:modelValue', value);
            }
        }
    }
}
</script>

<template>
    <div>
        <div class="label">{{ label }}</div>
        <div class="select_box" :style="{ width: size + '%' }">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="none" viewBox="0 0 8 8" class="m9FZB xFNAI nNSug ZDTKw Lf9ms"><path d="M7.776 1.85a.76.76 0 0 0-1.07 0L3.98 4.538 1.295 1.851a.759.759 0 1 0-1.07 1.077l3.217 3.218a.76.76 0 0 0 1.078 0l3.256-3.218a.76.76 0 0 0 0-1.077Z"></path><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="none" viewBox="0 0 8 8" class="m9FZB xFNAI nNSug ZDTKw Lf9ms"><path d="M7.776 1.85a.76.76 0 0 0-1.07 0L3.98 4.538 1.295 1.851a.759.759 0 1 0-1.07 1.077l3.217 3.218a.76.76 0 0 0 1.078 0l3.256-3.218a.76.76 0 0 0 0-1.077Z"></path></svg></svg>
            <select v-model="selected" @change="updateValue">
                <optgroup v-for="(option, idx) in options" :key="idx" :label="option.label">
                    <option v-for="item in option.items" :value="item.value" :selected="item.value == 'type1-1'">
                        {{ item.text }}
                    </option>
                </optgroup>
            </select>
        </div>
    </div>
</template>

<style scoped>
.label {
    font-weight: bold;
    margin-bottom: 5px;
}
select {
    appearance: none;
    border: 1px solid #c9cbcc;
    border-radius: 3px;
    color: #282e33;
    cursor: pointer;
    display: block;
    font-size: 13px;
    height: 34px;
    line-height: 33px;
    min-width: 200px;
    outline: none;
    padding: 0 24px 0 12px;
    width: 100%;
    background: linear-gradient(180deg, #fff, #f4f5f5 50%, #eeeeef);
    border-radius: 3px;
}
.select_box{
    position: relative
}
.select_box svg{
    pointer-events: none;
    position: absolute;
    right: 13px;
    top: 50%;
    fill: #a9abad;
    width: 8px;
    height: 8px;
    transform: translateY(-50%);
}
</style>
