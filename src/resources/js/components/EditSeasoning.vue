<template>
    <div>
        <draggable
            v-model="texts"
            :options="options"
            hendle=".handle"
            @end="onSort"
            class="mb-16"
        >
            <div v-for="(text, index) in texts" :key="text.id">
                <div class="flex md:flex-row mb-8">
                    <i
                        class="fas fa-bars fa-xs handler material-form-icon w-1/12"
                    />
                    <input
                        type="text"
                        class="rounded-lg border flex-1 w-5/12 appearance-none border border-gray-300 mr-8 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="調味料の名前を入力してください"
                        :name="'seasonings[' + index + '][seasoningName]'"
                        :value="text.name"
                    />
                    <input
                        type="text"
                        class="rounded-lg border flex-1 w-5/12 appearance-none border border-gray-300 mr-8 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="調味料の分量を入力してください"
                        :name="'seasonings[' + index + '][quantity]'"
                        :value="text.quantity"
                    />
                    <button
                        type="button"
                        class="text-white flex-shrink-0 w-1/12 px-4 py-2 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center"
                        @click="del(index)"
                    >
                        ×
                    </button>
                </div>
            </div>
        </draggable>
    </div>
</template>

<script>
import draggable from "vuedraggable";
export default {
    components: { draggable },
    props: {
        postId: {
            type: Number,
        },
        seasonings: {
            type: Object,
        },
    },
    data() {
        return {
            postId: this.postId,
            texts: [...this.seasonings],
            // texts:[],
            maxTextCount: 30,
            options: {
                animation: 200,
            },
        };
    },
    methods: {
        onInput(event) {
            // console.log(this.texts[index].quantity);
            console.log(this.$ref.input.value);
        },
        onSort(event) {
            console.log(event);
        },
        del(index) {
            this.texts.splice(index, 1);
        },
        onSubmit() {
            const url = this.endpoint;
            const formData = new f();
            formData.appned("texts", this.texts);
            const params = {
                texts: this.texts,
            };
            axios
                .patch(url, formData)
                .then((response) => {
                    location.href = this.endpoint;
                })
                .catch((error) => {
                    //  失敗時
                });
        },
    },
    computed: {
        isTextMax() {
            return this.texts.length >= this.maxTextCount;
        },
    },
};
</script>
