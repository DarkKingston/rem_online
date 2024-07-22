<script>
import { ref } from 'vue';

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
    emits: ['update:modelValue'],
    setup(){
        const counter = ref(1);
        const numeration = ref(1);
        const popupState = ref(false);

        function generateOrderNumber(template, counter) {
            const prefixMatch = template.match(/^[A-Za-z]+/);
            const prefix = prefixMatch ? prefixMatch[0] : '';
            const formatMatch = template.match(/\{C:(\d+)\}/);
            let numDigits = formatMatch ? parseInt(formatMatch[1], 10) : 1; // Если нет числа, то по умолчанию 1 цифра
            if (numDigits > 9) {
                numDigits = 9;
            }
            const orderNumber = String(counter).padStart(numDigits, '0');
            return `${prefix}${orderNumber}`;
        }

        function changeCounter(counter) {
            togglePopup();
            console.log('change counter');
        }

        function togglePopup() {
            popupState.value = !popupState.value;
        }

        function changeNumeration(eventOrOperation) {
            if (typeof eventOrOperation === 'number') {
                const newValue = numeration.value + eventOrOperation;
                if (newValue > 0) {
                    numeration.value = newValue;
                }
            } else {
                const newValue = parseInt(eventOrOperation.target.value, 10);
                if (!isNaN(newValue) && newValue > 0) {
                    numeration.value = newValue;
                } else {
                    eventOrOperation.target.value = numeration.value;
                }
            }
        }

        function saveNum() {
            counter.value = numeration.value;
            togglePopup();
        }

        return {
            generateOrderNumber,
            counter,
            togglePopup,
            changeCounter,
            popupState,
            changeNumeration,
            numeration,
            saveNum
        }
    }
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
        <div class="example">
            Пример: заказ № <span class="link" @click="changeCounter(counter)">{{ generateOrderNumber(`${modelValue}`, counter) }}</span>
        </div>
        <div class="popup" :class="{active:popupState}">
            <div class="popup_center">
                <div class="popup_center_content">
                    <div class="popup_header">
                        <div class="popup_header_title">
                            Изменить нумерацию
                        </div>

                        <div class="popup_close" @click="togglePopup">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#939699" width="16" height="16" viewBox="0 0 16 16" class="m9FZB pBLJp Lr8ZQ Lf9ms"><path fill-rule="evenodd" d="M2.877 1.123a1.216 1.216 0 0 0-1.754 0 1.216 1.216 0 0 0 0 1.754L5.896 7.65l-4.773 4.773a1.217 1.217 0 0 0 0 1.754 1.217 1.217 0 0 0 1.754 0L7.65 9.404l4.773 4.773a1.217 1.217 0 0 0 1.754 0 1.217 1.217 0 0 0 0-1.754L9.404 7.65l4.773-4.773a1.217 1.217 0 0 0 0-1.754 1.217 1.217 0 0 0-1.754 0L7.65 5.896z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="popup_box" style="padding: 0 16px;">
                        <div class="label">
                            Начало нумерации
                        </div>
                        <div class="popup_box_inp">
                            <input type="number" class="num_inp" min="1" :value="numeration" @input="changeNumeration" style="width: 110px; text-align: right;">
                            <div class="arrows_wrapper">
                                <div class="arrow_up" @click="changeNumeration(+1)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#939699" width="8" height="8" viewBox="0 0 8 8" class="m9FZB nNSug Lr8ZQ Lf9ms" data-cid="input-arrow-up-icon"><path d="M.207 5.074 3.47 1.85a.76.76 0 0 1 1.08 0l3.225 3.225a.76.76 0 1 1-1.073 1.08L4.01 3.462 1.317 6.154a.76.76 0 0 1-1.072 0 .76.76 0 0 1-.038-1.08"></path></svg>
                                </div>
                                <div class="arrow_down" @click="changeNumeration(-1)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#939699" width="8" height="8" viewBox="0 0 8 8" class="m9FZB nNSug Lr8ZQ Lf9ms" data-cid="input-arrow-down-icon"><path d="M7.776 1.85a.76.76 0 0 0-1.07 0L3.98 4.538 1.295 1.851a.759.759 0 1 0-1.07 1.077l3.217 3.218a.76.76 0 0 0 1.078 0l3.256-3.218a.76.76 0 0 0 0-1.077Z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popup_footer">
                        <button class="popup_submit"  @click="saveNum">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
.example{
    font-size: 12px;
    font-weight: 400;
    color: #282e33;
    line-height: 20px;
}
.link{
    cursor: pointer;
    background: 0 0;
    border: none;
    color: #1e79c7;
    font-size: 12px;
    font-weight: 400;
    padding: 0;
}

.popup_box{
    position: relative;
}
.popup_box_inp{
    position: relative;
}
</style>
