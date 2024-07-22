<script>
import { ref, toRefs, watch } from "vue";

export default {
    props: {
        label: String,
        hint: String,
        modelValue: {
            type: Object,
            default: () => ({}),
        },
    },
    emits: ['update:modelValue'],
    setup(props) {
        const { modelValue } = toRefs(props);
        const users = ref(modelValue);

        // Управление чекбоксами в заголовке
        const headerAccessChecked = ref(false);
        const headerWorkChecked = ref(false);

        // Функция для переключения всех чекбоксов
        const toggleAll = (property, checked) => {
            users.value.forEach(user => user.userInfo[property] = checked);
        };

        // Наблюдаем за изменениями в users для синхронизации чекбоксов в заголовке
        watch(users, (newUsers) => {
            headerAccessChecked.value = newUsers.every(user => user.userInfo.access);
            headerWorkChecked.value = newUsers.every(user => user.userInfo.work);
        }, { deep: true });

        // Обновляем состояния в заголовке при изменении пользователей
        watch([headerAccessChecked, headerWorkChecked], ([newAccessChecked, newWorkChecked]) => {
            if (newAccessChecked) {
                toggleAll('access', true);
            }
            if (newWorkChecked) {
                toggleAll('work', true);
            }
        });

        return {
            modelValue,
            users,
            headerAccessChecked,
            headerWorkChecked,
            toggleAll
        };
    }
}
</script>

<template>
    <div>
        <div class="table_label">
            {{ label }}
        </div>
        <div class="table_popup">
            <div class="table_head_popup">
                <div class="table_head_cell_popup" style="width: 198px;">Сотрудник</div>
                <div class="table_head_cell_popup" style="width: 110px;">
                    <div class="day_checkbox">
                        <input type="checkbox" v-model="headerAccessChecked" @change="toggleAll('access', headerAccessChecked)" id="headerAccess" />
                        <label for="headerAccess"></label>
                    </div>
                    Доступ
                </div>
                <div class="table_head_cell_popup" style="width: 140px;">
                    <div class="day_checkbox">
                        <input type="checkbox" v-model="headerWorkChecked" @change="toggleAll('work', headerWorkChecked)" id="headerWork" />
                        <label for="headerWork"></label>
                    </div>
                    График работы
                </div>
            </div>
            <div class="table_body_popup">
                <div class="table_body_row_popup" v-for="user in users" :key="user.userInfo.name">
                    <div class="table_body_cell_popup" style="width: 198px;">{{ user.userInfo.name }}</div>
                    <div class="table_body_cell_popup" style="width: 110px;">
                        <div class="day_checkbox">
                            <input type="checkbox" v-model="user.userInfo.access" :id="user.userInfo.name + '_access'" />
                            <label :for="user.userInfo.name + '_access'"></label>
                        </div>
                    </div>
                    <div class="table_body_cell_popup" style="width: 140px;">
                        <div class="day_checkbox">
                            <input type="checkbox" v-model="user.userInfo.work" :id="user.userInfo.name + '_work'" />
                            <label :for="user.userInfo.name + '_work'"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hint">
            {{ hint }}
        </div>
    </div>
</template>

<style scoped>
.table_head_popup {
    display: flex;
    align-items: center;
    width: 100%;
}
.table_head_cell_popup {
    background: #eeeeef;
    color: #282e33;
    min-height: 41px;
    padding: 8px;
    position: relative;
    border-right: 1px solid #fff;
    display: flex;
    align-items: center;
    gap: 8px;
    font: 400 12px Open Sans, ruble, sans-serif;
}
.hint {
    color: #939699;
    margin-bottom: 16px;
    font-size: 12px;
    font-weight: 400;
}
.table_body_popup {
    width: 100%;
}
.table_body_cell_popup {
    border-right: 1px solid transparent;
    overflow: hidden;
    padding: 8px;
    height: 100%;
    min-height: 46px;
}
.table_body_row_popup {
    display: flex;
    align-items: center;
    background: #fff;
    border-bottom: 1px solid #eeeeef;
    font: 400 12px Open Sans, ruble, sans-serif;
}
.table_body_row_popup:hover .table_body_cell_popup {
    background: #edf4fb;
}

.table_label {
    line-height: 16px;
    margin-bottom: 16px;
    color: #282e33;
    display: block;
    font-size: 12px;
    font-weight: 700;
}
.day_checkbox input {
    display: none;
}
.day_checkbox label {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 1px solid #c9cbcc;
    border-radius: 4px;
    box-sizing: border-box;
    cursor: pointer;
    height: 16px;
    min-height: 16px;
    min-width: 16px;
    position: relative;
    width: 16px;
    box-shadow: 0 0 0 0 rgba(51, 122, 183, .1), inset 0 1px 1px 0 #d4d5d6;
}
.day_checkbox input:checked + label::before {
    border: solid #282e33;
    border-width: 0 0 2px 2px;
    content: "";
    height: 3px;
    left: 50%;
    margin: -3px 0 0 -4px;
    position: absolute;
    top: 50%;
    transform: rotate(-45deg);
    width: 6px;
}
</style>
