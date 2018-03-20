<form id="docData" method="post" enctype="multipart/form-data">
    Select Document to upload:
    <input type="hidden" name="doc_id" id="doc_id" value="<?= $document_id ?>">
        <input type="file" name="qualification_doc" id="qualification_doc">
   
        <input type="button" value="Upload Image" onclick="UploadImage()" name="submit">
    
</form>