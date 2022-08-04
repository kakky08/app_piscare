<template>
    <div class="material">
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id">
                <p class="border-bottom boundary-line">{{index + 1}}</p>
                <div class="procedure-form-update">
                    <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                    <!-- <img :src="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + text.photo" style="width:200px" >
                    <input type="file" :name="'procedures[' + index + '][photo]'">
                    <image-update
                        :name="'procedures[' + index + '][path]'"
                        :path="`${path}/${text.photo}`"
                    >
                    </image-update> -->
                    <input type="hidden" :name="'procedures[' + index + '][order]'" :value="index">
                    <input type="hidden" :name="'procedures[' + index + '][old_file]'" :value="text.photo">
                    <!-- <input type="hidden" :name="'procedures[' + index + '][new_file]'" :value="file">
                    <update-image
                        :url="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + text.photo"
                        @parentMethod="file"
                    >
                    </update-image> -->

                    <div class="row cols-2 procedure-form-group">
                        <div class="col-4 image-input-block" >
                            <div class=" image-input-box">
                                <div class="image-input-field">
                                    <input type="file" :name="'procedures[' + index + '][file]'" title ref="preview" @change="onChange">
                                    <p>
                                        <span class="image-input-text">クリックして料理の写真を載せる</span>
                                        <br>
                                        <i class="fas fa-camera fa-2x"></i>
                                    </p>
                                    <div v-if="url">
                                        <div class="preview-box">
                                            <img class="preview-image" :src="url">
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="preview-box">
                                            <img class="preview-image" :src="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + text.photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea
                        type="text"
                        class="form-control col"
                        placeholder="材料の分量を入力してください"
                        :name="'procedures[' + index + '][procedure]'"
                        :value="text.procedure"
                    >
                    </textarea>
                    <button type="button" class="btn col-1 material-form-button" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
    </div>
</template>

<script>
    import draggable from 'vuedraggable';
    import UpdateImage   from './UpdateImage.vue';
    import ProcedureComponent from "./ProcedureComponent.vue";
    export default {
        components: {
            draggable,
            UpdateImage,
            ProcedureComponent
        },
        props:{
            postId: {
                type: Number
            },
            procedures :{
                type: Object
            },
            path :{
                type: String
            }

        },
        data() {
            return {
                postId: this.postId,
                texts: [...this.procedures],
                // texts:[],
                url: '',
                maxTextCount: 30,
                options: {
                    animation: 200
                },
            }
        },
        methods: {
            onChange(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file);
            },
           /*  file(url){
                this.url = url
            }, */
            onInput(event){
                // console.log(this.texts[index].quantity);
                console.log(this.$ref.input.value);
            },
            onSort (event) {
                console.log(event);
            },
            del(index) {
                this.texts.splice(index, 1)
            },
            onSubmit() {
                const url = this.endpoint;
                const formData = new f
                formData.appned('texts', this.texts)
                const params = {
                    texts: this.texts
                };
                axios.patch(url, formData)
                    .then(response => {
                        location.href = this.endpoint;
                    })
                    .catch(error => {
                        //  失敗時
                    });
            }
        },
        computed: {
            isTextMax() {
                return (this.texts.length >= this.maxTextCount);
            }
        }
    }
</script>
