<?php
// Create a custom parser function
    use App\Models\Images;

    function parseGalleryShortcode($content)
    {
        // Regular expression pattern to match [gallery] shortcode with different options
        $pattern = '/\[gallery\s+(link="[^"]*")?\s*(type="[^"]*")?\s*(size="[^"]*")?\s*images="([^"]+)"\]/i';

        return preg_replace_callback($pattern, function ($matches) {
            $galleryLink = $matches[1] ?? ''; // Default to an empty string if 'link' is not provided
            $galleryType = $matches[2] ?? ''; // Default to an empty string if 'type' is not provided
            $gallerySize = $matches[3] ?? ''; // Default to an empty string if 'size' is not provided
            $imageIds = explode(',', $matches[4]);
            $imageTags = [];

            foreach ($imageIds as $imageId) {
                // Assuming you have an 'images' table with 'path' column
                $image = Images::find($imageId);

                if ($image) {
                    $classAttribute = trim("$galleryType $gallerySize");
                    $imageTag = '<img src="' . $image->path . '" alt="Image ' . $imageId . '" class="' . $classAttribute . '" width="300" height="200">';

                    // Check if a link is provided
                    if ($galleryLink && $galleryLink !== 'none') {
                        $imageTag = '<a href="' . $galleryLink . '">' . $imageTag . '</a>';
                    }

                    $imageTags[] = $imageTag;
                }
            }

            $galleryHtml = '<div class="gallery">' . implode('', $imageTags) . '</div>';
            return $galleryHtml;
        }, $content);
    }

    function parseVideoShortcode($content)
    {
        // Regular expression pattern to match [video] shortcode
        $pattern = '/\[video\s+width="([^"]+)"\s+height="([^"]+)"\s+mp4="([^"]+)"\]\[\/video\]/i';

        return preg_replace_callback($pattern, function ($matches) {
            $width = $matches[1];
            $height = $matches[2];
            $mp4 = $matches[3];

            // Generate the video player HTML
            $videoHtml = '<video width="' . $width . '" height="' . $height . '" controls>';
            $videoHtml .= '<source src="' . $mp4 . '" type="video/mp4">';
            $videoHtml .= 'Your browser does not support the video tag.';
            $videoHtml .= '</video>';

            return $videoHtml;
        }, $content);
    }

    function parseSuListShortcode($content)
    {
        // Regular expression pattern to match [su_list] shortcode
        $pattern = '/\[su_list\s+icon="([^"]+)"\s*\](.*?)\[\/su_list\]/is';

        return preg_replace_callback($pattern, function ($matches) {
            $iconClass = str_replace('icon: ', 'sui-', $matches[1]); // Replace ':' with '-'
            $listContent = $matches[2];

            // Wrap each list item <li> with an <i> tag
            $listContent = preg_replace('/<li>(.*?)<\/li>/', '<li><i class="sui ' . $iconClass . '"></i> $1</li>', $listContent);

            // Generate the HTML structure
            $output = '<div class="su-list" style="margin-left:0px">';
            $output .= '<ul>';
            $output .= $listContent;
            $output .= '</ul>';
            $output .= '</div>';

            return $output;
        }, $content);
    }



