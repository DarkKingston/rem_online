<script>
import { ref } from 'vue';
import Input from "../ui/Input";
import InputOrder from "../ui/InputOrder";
import WorkDays from "../ui/WorkDays";
import ChangeIcon from "../ui/ChangeIcon";
import Select from "../ui/Select";
import Employee from "../ui/Employee";

export default {
    components: {
        Select,
        Input,
        InputOrder,
        WorkDays,
        ChangeIcon,
        Employee
    },
    setup() {
        const popupName = ref('');
        const popupAddress = ref('');
        const popupOrder = ref('A{C:3}');
        const popupDocuments = ref('A{C:3}');
        const objWorkDays = ref({
            days: [
                { name: 'понедельник', enabled: true, startTime: '09:00', endTime: '18:00' },
                { name: 'вторник', enabled: true, startTime: '09:00', endTime: '18:00' },
                { name: 'среда', enabled: true, startTime: '09:00', endTime: '18:00' },
                { name: 'четверг', enabled: true, startTime: '09:00', endTime: '18:00' },
                { name: 'пятница', enabled: true, startTime: '09:00', endTime: '18:00' },
                { name: 'суббота', enabled: false, startTime: '09:00', endTime: '18:00' },
                { name: 'воскресенье', enabled: false, startTime: '09:00', endTime: '18:00' },
            ]
        });
        const selectedIconData = ref({
            icon: 0,
            color: 0,
            fill: '#ccc'
        });

        const orderTypes = ref([
            {
                label: 'Тип заказа',
                items:[
                    {
                        value: 'type1-1',
                        text: 'Выездной'
                    },
                    {
                        value: 'type1-2',
                        text: 'Гарантийный'
                    },
                    {
                        value: 'type1-3',
                        text: 'Принят в СЦ'
                    }
                ]
            },
            {
                label: 'Выездной',
                items:[
                    {
                        value: 'type2-1',
                        text: 'Запоминать последний'
                    },
                    {
                        value: 'type2-2',
                        text: 'Не задано'
                    }
                ]
            },
        ]);
        const selectedOrderType = ref('type1-1');

        // Данные о сотрудниках
        const employeeData = ref([
            {
                access: false,
                work: false,
                userInfo: {
                    name: 'Test',
                    work: false,
                    access: false
                }
            },
            {
                access: false,
                work: false,
                userInfo: {
                    name: 'Test2',
                    work: false,
                    access: false
                }
            },
        ]);

        const savePopup = () => {
            const popupData = {
                name: popupName.value,
                address: popupAddress.value,
                orderTemplate: popupOrder.value,
                documentsTemplate: popupDocuments.value,
                workDays: objWorkDays.value,
                icon: selectedIconData.value,
                orderType: selectedOrderType.value,
                employees: employeeData.value.map(user => ({
                    name: user.userInfo.name,
                    access: user.userInfo.access,
                    work: user.userInfo.work
                }))
            };

            console.log('Собранные данные из попапа:', popupData);
            // Здесь вы можете отправить popupData на сервер или обработать его другими способами
        };


        return {
            popupName,
            popupAddress,
            WorkDays,
            objWorkDays,
            selectedIconData,
            popupOrder,
            popupDocuments,
            orderTypes,
            selectedOrderType,
            employeeData,
            savePopup
        }
    }
}
</script>

<template>
    <div class="popup_main">

    <div class="popup_wrapper">
        <div class="popup_box">
            <Input
                label="Название"
                :required="true"
                v-model="popupName"
            />
        </div>
        <div class="popup_box">
            <Input
                label="Адрес"
                v-model="popupAddress"
            />
        </div>
        <div class="popup_box">
            <WorkDays label="Время работы" v-model="objWorkDays" />
        </div>
        <div class="popup_box">
            <ChangeIcon label="Цвет и иконка локации" v-model="selectedIconData" />
        </div>
        <div class="popup_box">
            <Select
                label="Тип заказа по умолчанию"
                :options="orderTypes"
                :size="50"
                v-model="selectedOrderType"
            />
        </div>
        <div class="popup_box">
            <InputOrder
                label="Шаблон номера заказа"
                :required="true"
                :size="50"
                v-model="popupOrder"
            />
        </div>
        <div class="popup_box">
            <Input
                label="Шаблон номера документов"
                :required="true"
                :size="50"
                v-model="popupDocuments"
            />
            <div class="popup_hint">
                <p>{D} означает текущий день, {M} — месяц, а {Y} — год.</p>
                <p>{C:5} означает счетчик заказов длиной в пять символов и заполнением слева символом 0</p>
            </div>
        </div>
        <div class="popup_box">
            <Employee
                label="Сотрудники"
                hint='"Доступ" — сотрудник может переключаться в локацию и видеть данные в ней. "График работы" — отображает сотрудника при планировании графика работы локации.'
                v-model="employeeData"
            />
        </div>
    </div>

    </div>
    <div class="popup_footer">
        <button class="popup_submit"  @click="savePopup">
            Сохранить
        </button>
    </div>
</template>

<style scoped>
.popup_wrapper {
    flex: 1 1;
    -webkit-overflow-scrolling: touch;
    overflow: auto;
    padding: 16px;
    padding-right: 6px;
}

.popup_hint {
    color: #939699;
    font-size: 12px;
    font-weight: 400;
    max-width: 425px;
    margin-top: 16px;
}

.popup_box {
    margin-bottom: 16px;
}
</style>
