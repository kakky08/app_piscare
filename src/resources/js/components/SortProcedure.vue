<template>
    <div>
        <draggable
            v-model="texts"
            :options="options"
            hendle=".handle"
            class="mb-16"
            @end="onSort"
        >
            <div v-for="text in texts" :key="text.id">
                <div class="flex md:flex-row justify-around mb-12 items-center">
                    <i
                        class="fas fa-bars fa-xs col-1 handler material-form-icon w-2/12"
                    />
                    <div class="w-5/12">
                        <img
                            class="w-40 sm:w-72 h-40 sm:h-72 mx-auto object-cover bg-center"
                            :src="
                                'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' +
                                text.photo
                            "
                        />
                    </div>
                    <p class="w-5/12 px-4 pt-4 pb-4 sm:pb-20 border border-solid border-gray-400">
                        {{ text.procedure }}
                    </p>
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
        procedures: {
            type: Object,
        },
    },
    data() {
        return {
            postId: this.postId,
            texts: [...this.procedures],
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
