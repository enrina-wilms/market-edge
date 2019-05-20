<?php

//CLASS FOR THE STOCK MARKKET NEWS
class StockMarketNews{
    
	public function getAllNews($rss) {
	
		$newsRss = new DOMDocument();

		$newsRss->load($rss);

		$newsFeed = array();
		
		/*GETTING THE ITEMS ON THE RSS FEED AND MAKE INTO AN ARRAY
		USING THE DOMDOCUMENT TO LOAD THE RSS OR XML FILE FROM THE SOURCE
		THIS WILL GET THE NODE VALUES I NEED TO DISPLAY INFORMATION FOR NEWS ARTICLES*/
		
		foreach ($newsRss->getElementsByTagName('item') as $node) {
			
			$item = array (
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
				);
			
			//PUSHING THE ARRAY OF INFORMATION TAKEN FROM THE RSS FILE AND ADDING IT TO THE END
			array_push($newsFeed, $item);
			
		}

		/*NUMBER OF ARTICLES TO BE GENERATED AND DISPLAY
		SINCE I HAVEN'T IMPLEMENTed A PAGINATION I ONLY LIMIT THE NUMBER OF ARTICLES TO BE DISPLAYED FROM EACH SOURCE
		IN THIS CASE LIMIT IS 4 ARTICLES PER SOURCE*/
		$limit = 4;
		
		/*IM USING A FOR LOOP TO GENERATE INDIVIDUAL NEWS ARTICLE
		I ALSO WANT TO LIMIT THE WORDS TO BE DISPLAYED AS A DESCRIPTION INTO 20 WORDS*/
		for($i=0; $i<$limit; $i++) {
			
			$title = str_replace(' & ', ' &amp; ', $newsFeed[$i]['title']);
			$link = $newsFeed[$i]['link'];
			$description = $newsFeed[$i]['description'];
			
			//DISPLAY A NORMAL DATE FORMAT FOR THE PUBLISHED DATE
			$pubDate = date('l F d, Y', strtotime($newsFeed[$i]['pubDate']));

			$maxWords = 25;
			
            // WANT TO LIMIT THE WORDS THAT WILL BE DISPLAY FOR description
            if ($maxWords > 0) {
				
				//EACH WORD WILL BE INDIVIDUALLY COUNT AND CHECK
                $arrayWord = explode(' ', $description);
                if ($maxWords < count($arrayWord)) {
                    $description = '';
                    $wordCount = 0;
					
                    foreach($arrayWord as $word) {
                        $description .= $word . ' ';
                        $wordCount = $wordCount + 1;
						
						//NOW THE WORDS FROM THE DESCRIPTIO ALREADY COUNTED  IT WILL COMPARE THE WORD LIMIT AND DISPLAY THE WORDS APPENDING A LINK "..COntinue Reading"
                        if ($wordCount == $maxWords) {
                            break;
                        }
                    }
					// THIS LINK WILL BE APPEND IN THE description
                    $description .=  '<a class="news-title-link" href="' . $link 
								     . '" target="_blank">' . " ... Continue Reading" . '</a>';
                }
            }
			
			//DISPLAY THE INFROMATION FROM THE RSS FEEDS
			echo '<div class="col-sm-6 card-border news-container d-flex align-items-stretch">' . "\n" . "\t\t\t"
				.'<div class="news-header-custom">' . "\n" . "\t\t\t\t"
				.'</div>' . "\n" . "\t\t\t\t\t"
				.'<div class="card-body news-background">' . "\n" . "\t\t\t\t\t\t"
				.'<a class="news-title-link" href="' . $link . '" target="_blank">'
				. "\n" . "\t\t\t\t\t\t"
				.'<h5 class="card-title news-title-background">'
				
				//TITLE OF THE NEWS ARTICLE FROM THE RSS FEED
				. $title
				.'</h5>' . "\n" . "\t\t\t\t\t\t" . '</a>'
				.'<p class="card-text news-pub-date">Published: 
				'
				//UBLISHED DATE OF THE NEWS ARTICLE FROM THE RSS FEED
				. $pubDate
				.'</p>' . "\n" . "\t\t\t\t\t\t"
				.'<p class="card-text">'
				
				//DESCRIPTION OF THE NEWS ARTICLE FROM THE RSS FEED
				. $description
				.'</p>' . "\n" . "\t\t\t\t\t\t"
				.'<a href="'
				
				//LINK OF THE NEWS ARTICLE FROM THE RSS FEED WHERE YOU CAN FULLY READ A NEWS ARTICLE
				. $link
				. '" class="btn btn-primary btn-block news-button" target="_blank">'
				. 'Read More'
				.'</a>' . "\n" . "\t\t\t\t\t"
				.'</div>' . "\n" . "\t\t\t\t"
				.'</div>' . "\n";
			
		}//END FOR LOOP FOR RENDERING NEWS ARTICLE LINKS
		
	}// END OF getAllNews FUNCTION
	
}//EOF