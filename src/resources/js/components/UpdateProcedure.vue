<template>
    <div>
        <div class="row cols-2 procedure-form-group edit-procedure-form-group">
            <div class="col-4 image-input-block" >
                <div class="image-input-box">
                    <div class="image-input-field">
                        <input type="file" name="file" title ref="preview" @change="onChange">
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
                                <img
                                class="preview-image"
                                :src="'https://piscare-s3-image.s3.ap-northeast-1.amazonaws.com/' + procedure.photo"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <textarea type="text" class="form-control col-8  edit-procedure-form-textarea" cols="30" rows="10" placeholder="材料の分量を入力してください" name="procedure" :value="procedure.procedure"></textarea>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            procedure :{
                type: Object
            },
        },
        data() {
            return {
                procedure: this.procedure,
                url: '',
                maxTextCount: 30,
            }
        },
        methods: {
            onChange(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file);
            },
        },
        computed: {
            isTextMax() {
                return (this.texts.length >= this.maxTextCount);
            }
        }
    }
</script>
