<!DOCTYPE html>
<html>
<head>
    <title>Media Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .files-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: flex-start;
        }

        /* Style each file item */
        .file-item {
            width: 130px;
            height: 130px;
            margin: 10px;
            overflow: hidden;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            display: flex;
            justify-content: center; /* Horizontally center the image */
            align-items: center; /* Vertically center the image */
        }

        /* Style the image within each file item */
        .file-item img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            margin: auto; /* Center the image within its container */
        }
    </style>
</head>
<body>
    <div class="p-5">
        <h2>Media Library <button type="button" class="btn" id="selectImageBtn">test send</button></h2>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Date</label>
                        <select class="form-select" name="" id="">
                            <option selected>All Dates</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input class="form-control" type="text" name="" placeholder="Search...">
                    </div>
                </div>
            </div>
            <div id="filesListContainer" class="files-list">
            
            </div>
            <button id="loadMoreButton" class="btn btn-primary">Load More</button>        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imagesPerPage = 10;
            let currentPage = 1;
            
            function loadFiles(page) {
                fetch(`<?= base_url('ajax_media/') ?>${page}`)
                    .then(response => response.json())
                    .then(data => {

                        if(data.length != 0)
                        {
                            const filesListContainer = document.getElementById('filesListContainer');
                            data.forEach(file => {
                                const fileItem = document.createElement('div');
                                fileItem.className = 'file-item';
                                fileItem.innerHTML = `<img src="${file.m_file_path}" alt="${file.m_orig_name}">`;

                                fileItem.addEventListener('click', function() {
                                    window.parent.postMessage({ type: 'imageSelected', image: file.m_file_path }, '*');
                                });
                                
                                filesListContainer.appendChild(fileItem);
                            });
                        }
                        else{
                            document.getElementById('loadMoreButton').remove();
                        }
                    })
                    .catch(error => console.error('Error loading Files:', error));
            }

            loadFiles(currentPage);

            document.getElementById('loadMoreButton').addEventListener('click', function () {
                currentPage++;
                loadFiles(currentPage);
            });
        });
    </script>
</body>
</html>
