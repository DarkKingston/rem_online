<script>
export default {
    props: {
        label: String,
        required: {
            type: Boolean,
            default: false
        },
        type: {
            type: String,
            default: 'text'
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
    emits: ['update:modelValue']
}
</script>

<template>
    <div>
        <div class="label" v-if="label">{{ label }} <span v-if="required" style="color: red">*</span></div>
        <input
            :type="type"
            :required="required"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :style="{ width: size + '%' }"
        >
    </div>
</template>

<style scoped>
.label {
    color: #282e33;
    display: block;
    margin-bottom: 0;
    font-weight: 700;
    font-size: 12px;
}

input {
    height: 34px;
    padding: 8px 12px;
    font-size: 13px;
    background: #fff;
    box-shadow: inset 0 1px 2px rgba(40, 46, 51, .2);
    border: 1px solid #c9cbcc;
    display: flex;
    align-items: center;
    border-radius: 4px;
    color: #282e33;
}
</style>
