<template>
  <div>
    <textarea ref="editor" style="display: none;" v-model="content">
    </textarea>
  </div>
</template>
<script>
  export default 
  {
    props: ["_content"],
    data: function () {
      return {
        content : this._content
      }
    },
    mounted()
    {
      $(this.$refs.editor).summernote(
      {
        height: 300,
        popover: {},
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
        ]
      });
    },
    methods:
    {
     teste()
     {
      alert("teste");
    }
  }
}
</script>