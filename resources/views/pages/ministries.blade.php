@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Ministries</h2>
    <p>Discover how you can serve God and the community through our parish ministries.</p>
</div>
@php
$sections = [
    ['title' => 'Parish Councils', 'items' => [
        ['name' => 'Parish Pastoral Council (PPC)', 'img' => 'images/ministries/ppc.JPG',
         'desc' => 'The Parish Pastoral Council (PPC) is the principal consultative body that assists the parish priest in planning, implementing, and evaluating pastoral programs and activities of the parish.'],
        ['name' => 'Parish Finance Council (PFC)',  'img' => 'images/ministries/pfc.JPG',
         'desc' => 'The Parish Finance Council (PFC) oversees the financial affairs of the parish, ensuring transparency, accountability, and proper stewardship of the parish\'s resources.'],
    ]],
    ['title' => 'Mini Parish Pastoral Councils', 'items' => [
        ['name' => 'San Martin de Porres (Narra)',                   'img' => 'images/ministries/san-martin.jpg',        'desc' => 'A mini-parish community in Narra dedicated to serving its local faithful under the patronage of San Martin de Porres.'],
        ['name' => 'Mary Mother of God (Riverside)',                 'img' => 'images/ministries/mary-mother.jpg',       'desc' => 'A mini-parish community in Riverside serving parishioners under the patronage of Mary, Mother of God.'],
        ['name' => 'San Antonio de Padua (Laram)',                   'img' => 'images/ministries/san-antonio.jpg',       'desc' => 'A mini-parish community in Laram guided by the intercession of San Antonio de Padua.'],
        ['name' => 'Holy Family (United Bayanihan)',                 'img' => 'images/ministries/holy-family.jpg',       'desc' => 'A mini-parish community in United Bayanihan inspired by the values of the Holy Family.'],
        ['name' => 'San Isidro Labrador (Magsaysay Purok 1)',        'img' => 'images/ministries/san-isidro-1.jpg',      'desc' => 'A mini-parish community in Magsaysay Purok 1 under the patronage of San Isidro Labrador, patron of farmers.'],
        ['name' => 'Immaculate Conception (Magsaysay Purok 2)',      'img' => 'images/ministries/immaculate-2.jpg',      'desc' => 'A mini-parish community in Magsaysay Purok 2 devoted to the Immaculate Conception of the Blessed Virgin Mary.'],
        ['name' => 'Immaculate Conception (Villa San Pedro)',        'img' => 'images/ministries/immaculate-villa.jpg',  'desc' => 'A mini-parish community in Villa San Pedro honoring the Immaculate Conception.'],
        ['name' => 'Our Lady of Perpetual Help (Bagong Silang)',     'img' => 'images/ministries/olph.jpg',              'desc' => 'A mini-parish community in Bagong Silang seeking the intercession of Our Lady of Perpetual Help.'],
        ['name' => 'St. Joseph the Worker (Filinvest)',              'img' => 'images/ministries/st-joseph.jpg',         'desc' => 'A mini-parish community in Filinvest under the patronage of St. Joseph the Worker.'],
        ['name' => 'Our Lady of Visitation (Southern Heights 2)',    'img' => 'images/ministries/olv.jpg',               'desc' => 'A mini-parish community in Southern Heights 2 honoring Our Lady of Visitation.'],
        ['name' => 'Sto. Niño (United Better Living)',               'img' => 'images/ministries/sto-nino.jpg',          'desc' => 'A mini-parish community in United Better Living devoted to the Holy Child Jesus.'],
        ['name' => 'Black Nazarene (Estrella)',                      'img' => 'images/ministries/black-nazarene.jpg',    'desc' => 'A mini-parish community in Estrella with deep devotion to the Black Nazarene.'],
        ['name' => 'Divine Mercy (Villa Rosa Homes)',                'img' => 'images/ministries/divine-mercy.jpg',      'desc' => 'A mini-parish community in Villa Rosa Homes devoted to the Divine Mercy of Jesus.'],
        ['name' => 'San Isidro Labrador (Bayan-Bayanan)',            'img' => 'images/ministries/san-isidro-2.jpg',      'desc' => 'A mini-parish community in Bayan-Bayanan under the patronage of San Isidro Labrador.'],
    ]],
    ['title' => 'Priestly Ministry', 'items' => [
        ['name' => 'Lectors and Commentators Ministry',                'img' => 'images/ministries/lectors.JPG',        'desc' => 'Proclaims the Word of God during liturgical celebrations. Members are trained to read the Scriptures clearly and prayerfully at Mass.'],
        ['name' => 'Extraordinary Ministers of Holy Communion (EMHC)', 'img' => 'images/ministries/emhc.JPG',           'desc' => 'Assists the priest in the distribution of Holy Communion during Mass and brings the Eucharist to the sick and homebound.'],
        ['name' => 'Usherettes and Collectors Guild (UCG)',            'img' => 'images/ministries/ucg.JPG',            'desc' => 'Welcomes parishioners and visitors, maintains order during Mass, and assists in the offertory collection.'],
        ['name' => 'Parish Liturgical Music Ministry',                 'img' => 'images/ministries/music.JPG',          'desc' => 'Leads the congregation in worship through sacred music and song during liturgical celebrations.'],
        ['name' => 'Lingkod ng Dambana',                               'img' => 'images/ministries/lingkod.JPG',        'desc' => 'Serves at the altar during Mass, assisting the priest in liturgical rites and ceremonies.'],
        ['name' => 'Mother Butler Guild',                              'img' => 'images/ministries/mother-butler.JPG',  'desc' => 'A women\'s organization dedicated to the service of the altar, sacristy, and liturgical preparations.'],
        ['name' => 'Apostolado ng Panalangin',                         'img' => 'images/ministries/apostolado.JPG',     'desc' => 'Promotes devotion to the Sacred Heart of Jesus and the practice of daily prayer and offering.'],
        ['name' => 'Order of Franciscan Secular (OFS)',                'img' => 'images/ministries/ofs.JPG',            'desc' => 'A lay order following the spirituality of St. Francis of Assisi, dedicated to living the Gospel in daily life.'],
        ['name' => 'Holy Face of Jesus',                               'img' => 'images/ministries/holy-face.JPG',      'desc' => 'A devotional group centered on the Holy Face of Jesus, promoting reparation and adoration.'],
        ['name' => 'Little Brethren of Mary',                          'img' => 'images/ministries/little-brethren.jpg','desc' => 'A Marian devotional group dedicated to spreading love and devotion to the Blessed Virgin Mary.'],
    ]],
    ['title' => 'Prophetic Ministry', 'items' => [
        ['name' => 'Parish Catechetical Ministry',                   'img' => 'images/ministries/catechetical.jpg',  'desc' => 'Responsible for religious education in the parish, providing catechesis for children, youth, and adults.'],
        ['name' => 'El Shaddai',                                     'img' => 'images/ministries/el-shaddai.jpg',    'desc' => 'A Catholic charismatic movement that emphasizes praise, worship, and the power of prayer.'],
        ['name' => 'Parish Youth Council (PYC)',                     'img' => 'images/ministries/pyc.jpg',           'desc' => 'Organizes and leads youth activities, fostering faith formation and community involvement among the young parishioners.'],
        ['name' => 'Shepherd of the Lord Sheep',                     'img' => 'images/ministries/shepherd.jpg',      'desc' => 'A faith community dedicated to deepening the spiritual life of its members through prayer and fellowship.'],
        ['name' => 'Couples for Christ (CFC)',                       'img' => 'images/ministries/cfc.jpg',           'desc' => 'A family-based movement dedicated to the renewal and strengthening of Christian family life through evangelization.'],
        ['name' => 'Family & Life',                                  'img' => 'images/ministries/family-life.jpg',   'desc' => 'Promotes and defends the sanctity of life and the integrity of the family in accordance with Church teaching.'],
        ['name' => 'Social Communications Commission (SOCCOM)',      'img' => 'images/ministries/soccom.jpg',        'desc' => 'Manages the parish\'s social media, website, publications, and audio-visual communications.'],
        ['name' => 'Charismatic Movement',                           'img' => 'images/ministries/charismatic.jpg',   'desc' => 'A renewal movement that emphasizes the gifts of the Holy Spirit, praise and worship, and personal conversion.'],
        ['name' => 'Dalaw Patron sa Kapitbahayang Katoliko (DPKK)',  'img' => 'images/ministries/dpkk.jpg',          'desc' => 'Conducts home visitations to bring the faith and presence of the Church to Catholic households in the community.'],
    ]],
    ['title' => 'Kingly Ministry', 'items' => [
        ['name' => 'Health Ministry',                                        'img' => 'images/ministries/health.jpg',         'desc' => 'Organizes medical missions, health seminars, and wellness programs for the parishioners and the wider community.'],
        ['name' => 'Knights of Columbus (KOC)',                              'img' => 'images/ministries/koc.jpg',            'desc' => 'A Catholic fraternal organization committed to charity, unity, fraternity, and patriotism.'],
        ['name' => 'Parish Pastoral Council for Responsible Voting (PPCRV)', 'img' => 'images/ministries/ppcrv.jpg',         'desc' => 'Promotes honest, peaceful, and orderly elections through voter education and poll watching activities.'],
        ['name' => 'Ecology Ministry',                                       'img' => 'images/ministries/ecology.jpg',        'desc' => 'Promotes care for creation through environmental programs, clean-up drives, and ecological awareness campaigns.'],
        ['name' => 'Social Action Ministry',                                 'img' => 'images/ministries/social-action.jpg',  'desc' => 'Addresses social justice issues and serves the poor through livelihood, relief, and community development programs.'],
        ['name' => 'Migrant Ministry',                                       'img' => 'images/ministries/migrant.jpg',        'desc' => 'Provides pastoral care and support to overseas Filipino workers and their families in the parish.'],
        ['name' => 'Vocation Ministry',                                      'img' => 'images/ministries/vocation.jpg',       'desc' => 'Promotes and nurtures vocations to the priesthood, religious life, and consecrated life within the parish.'],
        ['name' => 'Prison Ministry',                                        'img' => 'images/ministries/prison.jpg',         'desc' => 'Brings the mercy and love of God to persons deprived of liberty through pastoral visits and spiritual programs.'],
        ['name' => 'Gawad Kalinga',                                          'img' => 'images/ministries/gawad-kalinga.jpg',  'desc' => 'A community development program that builds homes and transforms communities for the poorest of the poor.'],
        ['name' => 'Human Resource',                                         'img' => 'images/ministries/human-resource.jpg', 'desc' => 'Manages the personnel and volunteer resources of the parish, ensuring proper coordination among ministries.'],
    ]],
];
@endphp

<div class="ministry-page">
    @foreach($sections as $section)
    <div class="ministry-section">
        <h3 class="ministry-section-title">{{ $section['title'] }}</h3>
        <div class="ministry-cards">
            @foreach($section['items'] as $item)
            <div class="ministry-card" onclick="openModal('{{ addslashes($item['name']) }}', '{{ asset($item['img']) }}', '{{ addslashes($item['desc']) }}', {{ file_exists(public_path($item['img'])) ? 'true' : 'false' }})">
                @if(file_exists(public_path($item['img'])))
                    <img src="{{ asset($item['img']) }}" alt="{{ $item['name'] }}">
                @else
                    <div class="ministry-img-placeholder">&#9997;</div>
                @endif
                <div class="ministry-card-name">{{ $item['name'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<section style="text-align:center; margin-top:30px;">
    <p>Interested in joining a ministry? <a href="{{ url('contact') }}" style="color:#1a3a5c; font-weight:bold;">Contact us</a> and we'll get you connected!</p>
</section>

<!-- Modal -->
<div id="ministry-modal" class="modal-overlay" onclick="closeModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <button class="modal-close" onclick="closeModal()">&times;</button>
        <img id="modal-img" src="" alt="">
        <div id="modal-no-img" class="modal-no-img" style="display:none;">&#9997;</div>
        <h3 id="modal-name"></h3>
        <p id="modal-desc"></p>
    </div>
</div>

@push('styles')
<style>
.ministry-section { margin-bottom: 40px; }
.ministry-section-title { font-size:1.1rem; font-weight:700; color:#1a3a5c; border-left:4px solid #e8c96b; padding-left:10px; margin-bottom:16px; }
.ministry-cards { display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:16px; }
.ministry-card { background:#fff; border:1px solid #dde3ec; border-radius:10px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.06); text-align:center; cursor:pointer; transition:transform .2s, box-shadow .2s; }
.ministry-card:hover { transform:translateY(-4px); box-shadow:0 6px 16px rgba(0,0,0,0.12); }
.ministry-card img { width:100%; height:120px; object-fit:cover; }
.ministry-img-placeholder { width:100%; height:120px; background:#f0f4f8; display:flex; align-items:center; justify-content:center; font-size:2rem; color:#aaa; }
.ministry-card-name { padding:10px 8px; font-size:0.82rem; font-weight:600; color:#1a3a5c; line-height:1.3; }

/* Modal */
.modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:9999; align-items:center; justify-content:center; }
.modal-overlay.active { display:flex; }
.modal-box { background:#fff; border-radius:12px; max-width:420px; width:90%; padding:24px; position:relative; text-align:center; }
.modal-close { position:absolute; top:10px; right:14px; background:none; border:none; font-size:1.5rem; cursor:pointer; color:#555; }
.modal-box img { width:100%; height:220px; object-fit:cover; border-radius:8px; margin-bottom:14px; }
.modal-no-img { width:100%; height:220px; background:#f0f4f8; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:4rem; color:#aaa; margin-bottom:14px; }
.modal-box h3 { color:#1a3a5c; font-size:1rem; margin-bottom:10px; }
.modal-box p { font-size:0.88rem; color:#555; line-height:1.6; }
</style>
@endpush

@push('scripts')
<script>
function openModal(name, img, desc, hasImg) {
    document.getElementById('modal-name').textContent = name;
    document.getElementById('modal-desc').textContent = desc;
    if (hasImg) {
        document.getElementById('modal-img').src = img;
        document.getElementById('modal-img').style.display = 'block';
        document.getElementById('modal-no-img').style.display = 'none';
    } else {
        document.getElementById('modal-img').style.display = 'none';
        document.getElementById('modal-no-img').style.display = 'flex';
    }
    document.getElementById('ministry-modal').classList.add('active');
}
function closeModal() {
    document.getElementById('ministry-modal').classList.remove('active');
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
</script>
@endpush
@endsection
