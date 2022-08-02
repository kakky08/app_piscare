<template>
    <div class="row cols-2 procedure-form-group">
        <div class="col-4 image-input-block" >
            <div class=" image-input-box">
                <div class="image-input-field">
                    <input type="file" name="file" title ref="preview" @change="onChange">
                    <p>
                        <span class="image-input-text">クリックして料理の写真を載せる</span>
                        <br>
                        <i class="fas fa-camera fa-2x"></i>
                    </p>
                    <div class="preview-box" v-if="url">
                        <img class="preview-image" :src="url">
                    </div>
                </div>
            </div>
        </div>
        <textarea class="col-8 procedure-texarea" name="procedure" id="" cols="30" rows="10"></textarea>
    </div>
</template>

<script>
export default {
    name: "ProfileImagePreviewComponent",
    data(){
        return {
            url: ""
        }
    },
    methods: {
        onChange(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        }
    }
}
</script>
