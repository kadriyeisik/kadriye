<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run()
    {
        Blog::create([
            'title' => 'Onaymatik\'te Yazılım Stajı Deneyimim',
            'content' => 'Üniversite 3. sınıfta yaz döneminde başladığım Onaymatik stajı, benim için yazılım dünyasının gerçek yüzünü tanımamı sağladı. Burada ilk defa ekip çalışması içinde kod yazma fırsatım oldu. Java ve HTML/CSS bilgimi gerçek projelere uyguladım, aynı zamanda yeni teknolojiler öğrenmem gerekti.

Gerçek sistemlerde hata ayıklamak, test yazmak ve geri bildirim almak hem zorlayıcı hem de geliştiriciydi. Bu staj bana sadece teknik değil aynı zamanda profesyonel hayata dair pek çok şey öğretti.

🛠️ Özellikle:
• İlk başta kod düzenine alışmakta zorlandım ama zamanla sistematik düşünmeyi öğrendim.
• Takım arkadaşlarımdan \'code review\' almak, bana yazılımcı bakış açısını öğretti.
• Kendi başıma bir hatayı bulup çözdüğümde motivasyonum inanılmaz arttı.

✅ Tavsiyem: Staja başlamadan önce basit projeler yaparak pratik kazanın. Staj sadece bilginizi göstermek değil, öğrenmeye ne kadar açık olduğunuzu göstermekle ilgili.',
            'author' => 'Kadriye Işık',
        ]);

        Blog::create([
            'title' => 'Kişisel Web Sitemi Nasıl Yaptım?',
            'content' => 'Bir yazılımcı olarak kendimi daha iyi ifade edebilmek için kişisel bir web sitesi yapmak istedim. HTML ve CSS bilgimi gerçek bir projeye dönüştürmek hem eğlenceliydi hem de öğretici.

Sitede logomu kendim tasarladım, responsive tasarımı test ettim, JavaScript ile etkileşimli bölümler ekledim. Ardından GitHub Pages üzerinden ücretsiz olarak yayınladım.

🎨 Kendi yaptığım şeyler:
• Renk paletini sade ve kurumsal tuttum
• Footer, navbar, hakkımda ve blog bölümlerini tek tek kodladım
• Logo tasarımında yazılım odaklı bir stil kullandım (kod bloğu görünümü)

✅ Tavsiyem: Web sitesi yapmak teknik bir beceriden çok yaratıcı bir yolculuk. Kendinizi tanıtan bir site sizi bir adım öne taşır.',
            'author' => 'Kadriye Işık',
        ]);

        Blog::create([
            'title' => 'Bilgisayar Mühendisliği Öğrencisi Olarak Günlük Hayatım',
            'content' => 'Darıca Fen Lisesi\'nden mezun olup Alanya Üniversitesi\'nde İngilizce Bilgisayar Mühendisliği okumak benim için büyük bir dönüşümdü. Her dersin ayrı bir projesi, sınavı, ödevi var. Ama asıl gelişim ders dışında öğrendiklerimde oldu.

YouTube\'dan kaynak bulmak, dökümantasyon okumaya alışmak ve kendi başına çözüm üretmek bu işin kalbi. Hem kadın hem mühendis adayı olarak \'ben yapabilirim\' demeyi öğrendim.

🧠 Günlük alışkanlıklarım:
• En az 1 saat kodlama pratiği
• Haftalık proje veya blog planı
• GitHub\'da düzenli güncelleme
• Medium/YouTube\'dan yeni teknolojiler öğrenmek

💡 Öğrenci Tavsiyesi: Disiplinli çalışma rutini oluşturmak, uzun vadede en büyük kazancınız olacaktır!',
            'author' => 'Kadriye Işık',
        ]);

        Blog::create([
            'title' => 'Hangi Dil Ne Zaman? Java mı Python mu?',
            'content' => 'Üniversite projelerinde Java ile OOP mantığını çok iyi öğrendim. Ancak daha hızlı çözüm üretmek istediğimde Python devreye girdi. Özellikle:

• Java: Büyük ölçekli projeler ve OOP prensipleri için mükemmel
• Python: Veri analizi, makine öğrenmesi ve hızlı prototipleme için ideal
• JavaScript: Web arayüzleri ve etkileşimli uygulamalar için vazgeçilmez

🔍 Kişisel deneyimlerim:
• Okul projelerinde Java\'nın katı yapısı algoritmik düşünmemi geliştirdi
• Python\'da pandas kütüphanesiyle veri işleme çok daha pratik
• JavaScript async yapısını öğrenmek frontend development\'ta çığır açtı

🌟 Kariyer Tavsiyesi: \'Hangi dil?\' sorusundan çok \'Hangi problem?\' sorusuna odaklanın. Dil sadece araçtır!',
            'author' => 'Kadriye Işık',
        ]);
    }
}
