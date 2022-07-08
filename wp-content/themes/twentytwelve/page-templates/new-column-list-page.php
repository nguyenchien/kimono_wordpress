<?php
/**
* The template for displaying Search Results pages
 *
 * Template Name: New Column List Page
 *
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-blog-script', get_template_directory_uri() . '/js/new-formal-blog.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-blog-style', get_template_directory_uri() . '/css/new-formal-blog.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-blog-style');
wp_register_style('group-category-for-post-style', get_template_directory_uri() . '/css/group-category-for-post.css', array('twentytwelve-style'));
wp_enqueue_style('group-category-for-post-style');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if ($isSmartPhone) {
    wp_register_style('new-column-sp-v2-style', get_template_directory_uri() . '/css/new-column-sp-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-sp-v2-style');
} else {
    wp_register_style('new-column-pc-v2-style', get_template_directory_uri() . '/css/new-column-pc-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-column-pc-v2-style');
}
get_header('formal');
global $post, $custom_taxonomies;
$column_query_var = $post->post_name;
$column_parse_link = array(
    'kimono'=>'着物の豆知識',
    'homongi'=>'訪問着',
    'irotomesode'=>'色留袖',
    'tomesode'=>'留袖',
    'furisode'=>'振袖',
    'hakama'=>'袴',
    'ubugi'=>'産着',
    'mofuku'=>'喪服',
    'yukata'=>'浴衣',
    'kitsuke'=>'着付け',
    'obi'=>'帯',
    'komono'=>'小物',
    'hair-style'=>'髪型',
    'men'=>'男性',
    'wedding'=>'結婚',
    'coming-of-age'=>'成人',
    'graduation'=>'卒業',
    'enter-school'=>'入学',
    'shichigosan'=>'七五三',
    'shrine-visit-for-birth'=>'宮参り',
    'other'=>'十三参り',
    'monpuku'=>'紋付袴',
    'kids-hakama'=>'小学生袴',
);
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$banner_list = array(
    'column'    => array(
        'title' => '＼冠婚葬祭の着物レンタルはこちら／',
        'link'  => home_url().'/formal'
    ),
    'column_yukata'    => array(
        'title' => '＼浴衣のレンタルはこちら／',
        'link'  => home_url().'/takuhai/yukata',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_yukata.jpg',
        'title_h4' => '浴衣の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『浴衣』に関する記事を集めました。</br>浴衣は現代の日本人にもっとも馴染み深く、着たことがある着物と言えるでしょう。とは言えご自身で着るまでの頻度がある方は少なく、また一式揃えればそこそこ値の張る質の良い浴衣を安く手軽にレンタルされたいとご希望のお客様も多く、花火大会やお祭りシーズンはレンタルご希望のお客様が大勢ご来店になります。7-8月は非常に混み合いますのでお早めのご予約をおすすめしております。',
    ),
    'furisode-column'  => array(
        'title' => '＼振袖のレンタルはこちら／',
        'link'  => home_url().'/formal/furisode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_furisode.jpg',
        'alt'   => '振袖レンタルTOP',
        'title_h4' => '振袖の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『振袖』に関する記事を集めました。</br>振袖は成人式に着ることでよく知られていますが、結婚式にもお召いただけますから同級生が集まる学生時代のお友達の結婚式など、顔を合わせるメンバーが同じ結婚式が立て続けに重なる時などは特におすすめです。未婚女性の第一礼装で買えば一生モノ、子々孫々受け継がれる逸品の多い着物です。ママの振袖を着る方のお持ち込みも多く、帯や小物のみのレンタルで今風の着こなしもご提案しています。1月は非常に混み合いますのでお早めにお気軽にご相談ください。',
    ),
    'column_hakama'    => array(
        'title' => '＼袴のレンタルはこちら／',
        'link'  => home_url().'/formal/hakama',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_hakama.jpg',
        'alt'   => '袴のレンタルTOP',
        'title_h4' => '袴の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『袴』に関する記事を集めました。</br>袴というと20年くらい前までは男性が成人式や結婚式で着る紋付き袴が一般的でしたが、今は何と言っても女子大生が着る卒業式袴が人気です。高校、短大、大学の卒業式でしか着る機会のない卒業式袴は圧倒的にレンタルの方が多いですが、合わせるお着物を成人式でお召しの振袖や、お手元にお持ちの訪問着・小紋などになれる方も多くおいでです。wargoは袴だけレンタルももちろんOK！3月は非常に混み合いますのでお早めにお気軽にご相談ください。',
    ),
    'ubugi-column'     => array(
        'title' => '＼産着のレンタルはこちら／',
        'link'  => home_url().'/formal/ubugi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_ubugi.jpg',
        'alt'   => '産着のレンタルTOP',
        'title_h4' => '産着の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『産着』に関する記事を集めました。</br>産着は初着とも書き、掛着や祝い着とも呼ばれます。正式には男の子と女の子で若干の日にちの差はあるものの生後およそ1ヶ月後に氏神様に誕生の報告をされるお宮参りにお召しになります。一人目のお子さんだとお母様の毎日ははじめての連続、わからないことだらけで思い悩んだり、睡眠不足で疲れも最初のピークを迎える頃です。お宮参りは産着選び以外にも当日のお食事会など予め決めておくと当日非常にスムーズに思えることが多いものです。安定期に入って時間に余裕があり、赤ちゃんが産まれる前に色々調べておくのもよいですね。',
    ),
    'homongi-column'   => array(
        'title' => '＼訪問着のレンタルはこちら／',
        'link'  => home_url().'/formal/homongi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_homongi.jpg',
        'alt'   => '訪問着レンタルTOP',
        'title_h4' => '訪問着の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『訪問着』に関する記事を集めました。</br>訪問着は既婚・未婚問わず着る着物で、結婚式をはじめとしたお呼ばれのパーティ、お子様の卒業式や入学式など様々なシーンで大活躍してくれます。活躍の幅が広い分柄行もバラエティに富んでおり、紋の有無も含め、お手元にある訪問着がどのようなシーンに着ていけるのかわからないという方も多いようです。wargoでは持ち込みのお着物の着付けのみにも対応していますので、下見を兼ねてぜひお写真をお持ちください。',
    ),
    'kurotomesode-column' => array(
        'title' => '＼黒留袖のレンタルはこちら／',
        'link'  => home_url().'/formal/kurotomesode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_tomesode.jpg',
        'alt'   => '留袖（黒留袖・色留袖）レンタルTOP',
        'title_h4' => '留袖の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『留袖』に関する記事を集めました。</br>留袖は既婚女性の第一礼装でお子様やご親戚の結婚式に着る習わしは現在にも根強く浸透していますが、実は色留袖（地が黒以外の留袖）は主催、主賓の立場で参加するパーティなどにもお召になれる着物です。昨今の若いお母様はお祖母様と体格が違いお手元の留袖が着られないこともあり、レンタルのご利用も多くあります。貼り紋をご要望の場合準備にお時間をいただきますので早めのご予約をおすすめしています。',
    ),
    'irotomesode-column' => array(
        'title' => '＼色留袖のレンタルはこちら／',
        'link'  => home_url().'/formal/irotomesode',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_irotomesode.jpg',
        'alt'   => '色留袖レンタルTOP',
        'title_h4' => '色留袖の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『留袖』に関する記事を集めました。</br>留袖は既婚女性の第一礼装でお子様やご親戚の結婚式に着る習わしは現在にも根強く浸透していますが、実は色留袖（地が黒以外の留袖）は主催、主賓の立場で参加するパーティなどにもお召になれる着物です。昨今の若いお母様はお祖母様と体格が違いお手元の留袖が着られないこともあり、レンタルのご利用も多くあります。貼り紋をご要望の場合準備にお時間をいただきますので早めのご予約をおすすめしています。',
    ),
    'mofuku-column' => array(
        'title' => '＼和装の喪服レンタルはこちら／',
        'link'  => home_url().'/formal/mofuku',
        'title_h4' => 'その他様々な種類の着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『その他様々な種類の着物』に関する記事を集めました。</br>元来日本人の日常着であった小紋や和の習い事では親しまれている色無地、弔事で喪主が着る喪服など、ハレの日のイベント以外でもまだまだ種類多くの着物が着られています。ご自身でたくさん着物をお持ちの方でも先祖から受け継いだお着物でご自身では日頃のケアの仕方がわからないという方も、昨今は増えていると言えるでしょう。着物に関する様々な疑問にお答えできるコラムを日々徒然なるままにしたためてまいります。',
    ),
    'shichigosan-column' => array(
        'title' => '＼七五三の着物レンタルはこちら／',
        'link'  => home_url().'/formal/shichigosan',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_shichigosan.jpg',
        'title_h4' => '七五三で着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『七五三で着る着物』に関する記事を集めました。</br>11月にご予約が集中する七五三は、様々な種類の着物を幅広い世代の方がお召しになる機会ですが、この習わしは江戸時代には庶民にも広く浸透していた日本の伝統行事の1つです。主役にあたるお子様は3歳で被布、5歳男児で袴、7歳女児で四つ身を着るほか、お母様は訪問着や色留袖を、お祖母様は訪問着をお召しになることが多いです。記念写真など予定しているとお父様も着物と羽織のアンサブルでご家族全員和装に揃えることができます。',
    ),
    'kekkonshiki-column' => array(
        'title' => '＼結婚式の着物レンタルはこちら／',
        'link'  => home_url().'/formal/wedding',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_wedding.jpg',
        'alt'   => '結婚式の着物レンタルTOP',
        'title_h4' => '結婚式で着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『結婚式で着る着物』に関する記事を集めました。</br>花嫁様の白無垢や打ち掛け、花婿様の紋付き袴、ご両家のお母様や仲人さんの黒留袖、ご親族の色留袖、ご友人の振袖や訪問着・・・結婚式は現代のフォーマルイベントの中で最も多くの種類の着物を目にできる機会です。結婚式に関わる様々な立場の方が、着物の柄行はもちろん帯や草履、髪飾りやヘアセット、紋入れに至るまで多様な疑問を持ちインターネットでも多くの質疑が飛び交っています。気候の落ち着く春や秋は結婚式が多いためご予約が大変混み合います。この時期にお呼ばれの方には、招待状が届いたらできるだけ早いお下見をおすすめしています。',
    ),
    'seijin-column' => array(
        'title' => '＼成人式の振袖レンタルはこちら／',
        'link'  => home_url().'/formal/seijinshiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_coming_of_age.jpg',
        'alt'   => '成人式の振袖レンタルTOP',
        'title_h4' => '成人式で着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『成人式で着る着物』に関する記事を集めました。</br>その年度内に満20歳になる男女が晴れて大人の仲間入りをしたことを祝うために各地で催されている成人式には、多くの女性が振袖を、男性が紋付き袴を身に着けます。着物に関する知識・経験の少ない年代ですが、インターネットを介した様々な情報収集手段を持つ方が多く、ご友人同士で情報共有しながら着物選びを楽しまれている方が多い一方、やはりお下見となるとお母様とご一緒にご来店され判断を仰ぐ姿も多く見受けます。振袖の前撮りは日焼け前にご予定される方が多いです。',
    ),
    'sotsugyou-column'    => array(
        'title' => '＼卒業式の袴レンタルはこちら／',
        'link'  => home_url().'/formal/sotsugyoushiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_graduation.jpg',
        'alt'   => '卒業式の袴レンタルTOP',
        'title_h4' => '卒業式で着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『卒業式で着る着物』に関する記事を集めました。</br>高校、短大、大学と最近では専門学校や小学校の卒業式でも袴を履いて参加する学生さんがいらっしゃいます。テレビドラマや映画などの影響も少なからずあるものの、今や成人式の振袖に続く「着物習慣」として定着してきており、若い世代の着物やひいては日本の伝統文化に対する興味の高まりを感じざるを得ません。卒業式袴のお下見は振袖ほど長期スパンでないまでも、合格してからとなると人気柄は既に予約で埋まってしまうことも多いため、受験勉強が佳境に入る前に骨休めを兼ねてお越しになる方もいらっしゃります。',
    ),
    'nyugakushiki-column'    => array(
        'title' => '＼入学式の訪問着レンタルはこちら／',
        'link'  => home_url().'/formal/nyugakushiki',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_enter_school.jpg',
        'alt'   => '入学式の訪問着レンタルTOP',
        'title_h4' => '入学式で着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『入学式で着る着物』に関する記事を集めました。</br>小学校の入学式や幼稚園・保育園の卒園式には着物姿のお母さん方の姿が多くあります。小さなお子様が身体的にも精神的にも飛躍的に成長を遂げる大事な時期の大きなイベントにあたり、親としてご自身の身を引き締めたい想いが投影されているのかもしれません。入学式には春のはじまりにふさわしい淡色の訪問着がおすすめです。3月下旬から4月上旬に集中する卒園式、入学式にはご予約が立て込みますので早めのご予約をおすすめしています。',
    ),
    'omiyamairi-column'     => array(
        'title' => '＼お宮参りの着物レンタルはこちら／',
        'link'  => home_url().'/formal/omiyamairi',
        'img'   => WP_HOME.'/images/formal-rental/colum_contents_shrine_visit_for_birth.jpg',
        'alt'   => 'お宮参りの着物レンタルTOP',
        'title_h4' => 'お宮参りで着る着物の豆知識コラム',
        'description' => '店頭レンタル着付け無料！宅配レンタル送料無料！年間15万人以上のご利用実績を誇る「きものレンタルwargo」が着物の着方、選び方、フォーマルイベントにおけるマナーなどを豆知識としてまとめたコラムから『お宮参りで着る着物』に関する記事を集めました。</br>お宮参りはお子様誕生の折り氏神様にその誕生の報告に詣でる伝統行事です。産まれてきたお子様にとっては人生初にして主役である大変重要なイベントですから、身に纏う産着（=初着）は男の子も女の子も健康と幸せを象徴する吉祥文様が余すところなく散りばめられた豪華なデザインのものばかりです。まだ首の座らない小さなお子様との外出に加え父方の親御様がご一緒されることもあり、ご両親は非常に神経を使われます。下見や下調べに有用なコラムを多数掲載しています。',
    ),
    'dressing-column'     => array(
        'title' => '＼持ち込み着付けはこちらから／',
        'link'  => home_url().'/bring'
    ),
    'hairdressing'  => array(
        'title' => '＼ヘアセットプランのご予約はこちらから／',
        'link'  => home_url().'/hairset',
    ),
    'planx_collaboration'   => array(
        'title' => '＼団体着物体験のご予約はこちらから／',
        'link'  => home_url().'/group',
    ),
    'obi-column' => array(

    ),
    'komono-column' => array(

    ),
    'dansei-column' => array(

    ),
);
$query_var_mapping = array(
    'kimono' => array('column'),
    'homongi' => array('homongi-column'),
    'tomesode' => array('kurotomesode-column'),
    'irotomesode' => array('irotomesode-column'),
    'furisode' => array('furisode-column'),
    'hakama' => array('column_hakama'),
    'ubugi' => array('ubugi-column'),
    'mofuku' => array('mofuku-column'),
    'yukata' => array('column_yukata'),
    'kitsuke' => array('dressing-column'),
    'obi' => array('obi-column'),
    'komono' => array('komono-column'),
    'hair-style' => array('hairdressing'),
    'men' => array('dansei-column'),
    'wedding' => array('kekkonshiki-column'),
    'coming-of-age' => array('seijin-column'),
    'graduation' => array('sotsugyou-column'),
    'enter-school' => array('nyugakushiki-column'),
    'shichigosan' => array('shichigosan-column'),
    'shrine-visit-for-birth' => array('omiyamairi-column'),
    'other' => array('planx_collaboration'),
    'monpuku' => array('monpuku-column'),
    'kids-hakama' => array('kids-hakama-column'),
)
?>
<div class="container-box clearfix">
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="right-column">
								<div class="section-new-formal wrap-formal-blog">

                                    <div class="wrap-banner-formal column-banner">
                                        <div class="row main-banner">
                                            <?php if (!$isSmartPhone) : ?>
                                                <img class="pc" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-pc.jpg" alt="<?php echo Yii::t('wp_theme.column', 'column_'.$column_query_var.'_title'); ?>">
                                            <?php else: ?>
                                                <img class="sp" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-sp.jpg" width="414" height="204" alt="<?php echo Yii::t('wp_theme.column', 'column_'.$column_query_var.'_title'); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="wrap-breadcrumbs-column">
                                        <?php
                                            if (function_exists('yoast_breadcrumb')) {
                                                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                            }
                                        ?>
                                    </div>

									<div class="wrap-title-tabs">
										<ul class="tab-link">
											<li class="tab-item active"><a href="#news-article">新着</a></li>
											<li class="tab-item"><a href="#ranking-article">人気の記事</a></li>
										</ul>
										<div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span></div>
									</div>
									<div class="wrap-formal-content">
										<div class="wrap-blog-left-content">
											<div class="wrap-list-col-cate active" id="news-article">
                                                <header class="page-header">
                                                    <?php if (array_key_exists($column_query_var, $column_parse_link)) : ?>
                                                        <h1 class="page-title"><?php echo Yii::t('wp_theme.column', 'column_'.$column_query_var.'_title'); ?></h1>
                                                    <?php else: ?>
                                                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                                    <?php endif; ?>
                                                </header>

                                                <div class="wrap-articles-column list">
                                                    <ul class="list-articles-column">
                                                        <?php
                                                        $args = array();
                                                        $defaults = array(
                                                            'number_of_posts' => 8,
                                                            'post_type' => array('post'),
                                                            'order' => 'desc',
                                                            'thumbnail_size' => 'thumbnail',
                                                            'show_post_views' => true,
                                                            'show_post_thumbnail' => false,
                                                            'show_post_excerpt' => false,
                                                            'no_posts_message' => __('No Posts', 'post-views-counter'),
                                                            'item_before' => '',
                                                            'item_after' => ''
                                                        );
                                                        $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

                                                        // Get slug column
                                                        global $wp;
                                                        $slug_column = add_query_arg( array(), $wp->request );
                                                        $slug_column = explode('/', $slug_column);
                                                        $slug_length = count($slug_column);
                                                        $slug_column = $slug_column[$slug_length - 1];

                                                        $posts = pvc_get_most_viewed_posts(
                                                            array(
                                                                'posts_per_page' => (isset( $args['number_of_posts'] ) ? (int) $args['number_of_posts'] : $defaults['number_of_posts']),
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'category',
                                                                        'field' => 'slug',
                                                                        'terms' => $query_var_mapping["753"] ? $query_var_mapping["753"] : '',
                                                                    )
                                                                ),
                                                            )
                                                        );
                                                        $slug = $post->post_name;
                                                        $term = $query_var_mapping[$slug] ? $query_var_mapping[$slug] : $query_var_mapping["homongi"];
							                            $args = array(
                                                            'posts_per_page' => 8,
                                                            'tax_query' => array(
                                                                array(
                                                                    'taxonomy' => 'category',
                                                                    'field' => 'slug',
                                                                    'terms' => $term,
                                                                )
                                                            ),
                                                            'pagination' => true,
                                                            'paged' => $paged,
                                                        );
                                                        $posts = new WP_Query($args);
                                                        ?>
                                                        <?php
                                                        if ($posts->have_posts()) {
                                                            while ($posts->have_posts()) { $posts->the_post();
                                                                $img_post = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID, 'large', array('alt'=>get_the_title())) : '<img src="'.WP_HOME.'/images/no-image.png" width="392" height="327" alt="'.get_the_title().'">';
                                                                ?>
                                                                <li class="article-column flexbox">
                                                                    <div class="image-article-column"><a href="<?php echo get_permalink($post->ID); ?>"><?= $img_post; ?></a></div>
                                                                    <div class="info-article-column">
                                                                        <!--<p class="customer-views">--><?php //echo $args['show_post_views'] ? number_format_i18n(pvc_get_post_views($post->ID)) : '' ?><!-- view</p>-->
                                                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                                                            <h4 class="title-article-column"><?php echo get_the_title($post->ID); ?></h4>
                                                                            <p class="desc-article-column"><?php echo wp_trim_words( $post->post_content, 300, '...' ); ?></p>
                                                                        </a>
                                                                        <?php
                                                                        $obj_tax_column = get_the_terms($post->ID, 'category');
                                                                        if ($obj_tax_column) {
                                                                            ?>
                                                                            <ul class="list-cate-by-article flexbox">
                                                                                <?php foreach ($obj_tax_column as $tax_column) { ?>
                                                                                    <li class="cate-by-article"><a href="<?= get_term_link($tax_column->term_id); ?>"><?= $tax_column->name; ?></a></li>
                                                                                <?php } ?>
                                                                            </ul>
                                                                        <?php } ?>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php wp_pagenavi(array('query'=>$posts,'options' => array(
                                                        'prev_text' => '<span class="paging-nav prev"></span>',
                                                        'next_text' => '<span class="paging-nav next"></span>')));
                                                    ?>
                                                    <?php wp_reset_postdata(); ?>
                                                </div>
											</div>
                                            <div class="wrap-new-banner-collumn wrap-topics-banner-widget">
                                                <ul class="list-banner flexbox">
                                                    <?php
                                                    if (array_key_exists($column_query_var, $query_var_mapping)) {
                                                        $post_categories_slug = $query_var_mapping[$column_query_var];
                                                    }
                                                    if (!empty($post_categories_slug)) {
                                                        foreach ($post_categories_slug as $slug) {
                                                            $banner_meta = $banner_list[$slug];
                                                            if (empty($banner_meta)) {
                                                                continue;
                                                            }
                                                            ?>
                                                            <li class="item-banner">
                                                                <a href="<?=$banner_meta['link']?>">
                                                                    <p class="text-banner"><?=$banner_meta['title']?></p>
                                                                    <?php if (!empty($banner_meta['img'])) { ?>
                                                                        <div class="image-banner">
                                                                            <img alt="<?=$banner_meta['alt']?>" width="380" height="95" src="<?=$banner_meta['img']?>" />
                                                                        </div>
                                                                    <?php } ?>
                                                                </a>
                                                            </li>
                                                        <?php    }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="wrap-column-cate-detail">
                                                <?php
                                                if (array_key_exists($column_query_var, $query_var_mapping)) {
                                                    $post_categories_slug = $query_var_mapping[$column_query_var];
                                                }
                                                if (!empty($post_categories_slug)) {
                                                    foreach ($post_categories_slug as $slug) {
                                                        $banner_meta = $banner_list[$slug];
                                                        if (empty($banner_meta)) {
                                                            continue;
                                                        }
                                                        ?>
                                                        <?php if (!empty($banner_meta['title_h4'])) : ?>
                                                        <h4 class="title-column-cate"><?= $banner_meta['title_h4']; ?></h4>
                                                        <?php endif; ?>
                                                        <?php if (!empty($banner_meta['description'])) : ?>
                                                            <p class="description-column-cate"><?= $banner_meta['description']; ?></p>
                                                        <?php endif; ?>
                                                    <?php    }
                                                }
                                                ?>
                                                <div class="wrap-banners-column-cate">
                                                    <h2 class="title-column-cate">着物の種類で探す</h2>
                                                    <ul class="list-banners-column-cate flexbox">
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/homongi"><img src="<?= WP_HOME; ?>/images/column/banner-column-homongi.jpg" alt="訪問着"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/tomesode"><img src="<?= WP_HOME; ?>/images/column/banner-column-tomesode.jpg" alt="留袖"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/furisode"><img src="<?= WP_HOME; ?>/images/column/banner-column-furisode.jpg" alt="振袖"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/hakama"><img src="<?= WP_HOME; ?>/images/column/banner-column-hakama.jpg" alt="袴"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/ubugi"><img src="<?= WP_HOME; ?>/images/column/banner-column-ubugi.jpg" alt="産着"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/yukata"><img src="<?= WP_HOME; ?>/images/column/banner-column-yukata.jpg" alt="浴衣"></a>
                                                        </li>
                                                        <li class="banner-column-cate banner-column-cate-full">
                                                            <a href="<?= WP_HOME; ?>/column/mofuku"><img src="<?= WP_HOME; ?>/images/column/banner-column-mofuku.jpg" alt="その他の種類の着物"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-banners-column-cate">
                                                    <h2 class="title-column-cate">冠婚葬祭シーンから探す</h2>
                                                    <ul class="list-banners-column-cate flexbox">
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/wedding"><img src="<?= WP_HOME; ?>/images/column/banner-column-wedding.jpg" alt="結婚式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/coming-of-age"><img src="<?= WP_HOME; ?>/images/column/banner-column-coming-of-age.jpg" alt="成人式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/graduation"><img src="<?= WP_HOME; ?>/images/column/banner-column-graduation.jpg" alt="卒業式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/enter-school"><img src="<?= WP_HOME; ?>/images/column/banner-column-enter-school.jpg" alt="入学式"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/753"><img src="<?= WP_HOME; ?>/images/column/banner-column-753.jpg" alt="七五三"></a>
                                                        </li>
                                                        <li class="banner-column-cate">
                                                            <a href="<?= WP_HOME; ?>/column/shrine-visit-for-birth"><img src="<?= WP_HOME; ?>/images/column/banner-column-shrine-visit-for-birth.jpg" alt="お宮参り"></a>
                                                        </li>
                                                        <li class="banner-column-cate banner-column-cate-full">
                                                            <a href="<?= WP_HOME; ?>/column/other"><img src="<?= WP_HOME; ?>/images/column/banner-column-other.jpg" alt="その他のイベント・シーン"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
											<div class="wrap-list-col-cate" id="ranking-article">
												<?php get_template_part('include/column_ranking');?>
											</div>
										</div>
                                        <?php if ($isSmartPhone) : ?>
										<div class="wrap-sidebar-overlay">
											<div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
												<?php get_sidebar('column-ja'); ?>
											</div><!--end right-column-->
										</div>
                                        <?php endif; ?>
									</div>
								</div>
							</div><!--end right-column-->
						</div><!--end wrap-boths-column-->
					</div><!--end left-column-content-->
				</div><!--end wrap-column-content-->
			</div>
		</div><!--end content-v2-->
	</div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal');?>
