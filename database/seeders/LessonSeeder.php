<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $lessons = [
            [
                'course_id' => 1,
                'title' => 'Christ Our Foundation',
                'slug' => Str::slug('Christ Our Foundation'),
                'subtitle' => 'Christ Our Foundation',
                'lesson_note' => 'The construction of any building starts with the foundations. I grew up in Africa where I was used to seeing construction workers digging deep trenches into which they poured in concrete and iron steel to make the foundations secure. The Lord references this principle during His Sermon on the Mount. 24 “Therefore whoever hears these sayings of Mine, and does them, I will liken him to a wise man who built his house on the rock: 25 and the rain descended, the floods came, and the winds blew and beat on that house; and it did not fall, for it was founded on the rock. 26 “But everyone who hears these sayings of Mine, and does not do them, will be like a foolish man who built his house on the sand: 27 and the rain descended, the floods came, and the winds blew and beat on that house; and it fell. And great was its fall.” Matthew 7:24-26 In this lesson we will examine Scriptures that make it clear that not only are we Christians likened to a building, Jesus Christ is presented as our foundation.',
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/04/School-of-Ministry-lLesson-1.pdf',
                'lesson_video' => 'https://youtube.com/live/yGPqUn4tXjI?feature=share',
                'lesson_image' => 'images/lessons/intro.jpg',
                'lesson_order' => 1,
                'lesson_duration' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Salvation, Repentance and Belief',
                'slug' => Str::slug('Salvation, Repentance and Belief'),
                'subtitle' => 'Salvation, Repentance and Belief',
                'lesson_note' => 'One question you can ask and get so many varied answers to is “What exactly is the Gospel?” To answer that question accurately and biblically, we must look into the scriptures to answer them. Moreover, brethren, I declare to you the gospel which I preached to you, which also you received and in which you stand, 2 by which also you are saved, if you hold fast that word which I preached to you—unless you believed in vain. 3 For I delivered to you first of all that which I also received: that Christ died for our sins according to the Scriptures, 4 and that He was buried, and that He rose again the third day according to the Scriptures, 5 and that He was seen by [a]Cephas, then by the twelve. 1 Corinthians 15:1-5 22 “Men of Israel, hear these words: Jesus of Nazareth, a Man attested by God to you by miracles, wonders, and signs which God did through Him in your midst, as you yourselves also know— 23 Him, being delivered by the determined purpose and foreknowledge of God, you [a]have taken by lawless hands, have crucified, and put to death; 24 whom God raised up, having [b] loosed the [c] pains of death, because it was not possible that He should be held by it.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/04/School-of-Ministry-lLesson-2.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/mf4ZajvwncU?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 2,
                'lesson_duration' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Can a Christian Lose Their Salvation (Part 1)',
                'slug' => Str::slug('Can a Christian Lose Their Salvation Part 1'),
                'subtitle' => 'Can a Christian Lose Their Salvation Part 1',
                'lesson_note' => 'We are going to address this matter purely from the Scriptures and not any church traditions, prevailing ideas or beliefs. The best way to properly dissect this matter is using scripture to highlight and explain scriptural Salvation. The first aim here is to unpack Biblical Salvation fully so that this question can be handled within the right context. If we don’t present a thorough study and Bible digest on the contents of Salvation, any answers given can be misunderstood. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/05/School-of-Ministry-lLesson-3-1.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/mf4ZajvwncU?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 3,
                'lesson_duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Can a Christian Lose Their Salvation (Part 2)',
                'slug' => Str::slug('Can a Christian Lose Their Salvation Part 2'),
                'subtitle' => 'Can a Christian Lose Their Salvation Part 2',
                'lesson_note' => 'In the last lesson we looked at Biblical Salvation and saw from the scriptures that true Redemption through Jesus Christ happens in three dimensions.  Firstly, Salvation is Spiritual and represents the reality of what Christ has done on behalf of all mankind. It is always outlined in the Scriptures in the past tense. It has been finished, completed, done and fulfilled. 2Cor5:16-19, Col1:12-14, 2Tim1:9 Then Salvation is an ongoing process that flows out from what has been completed into the realm of the mind, soul and emotions and body. This does NOT add or subtract from Salvation in any way! This is presented in Scripture in the present continuous tense. Here the Believer is expected to exert Calvary’s victory over the body (flesh), mind and thoughts and imagination. 1Cor1:18, Phil2:12. Lastly Salvation is the final physical redemption of the Body which will take place in the future. This is not accomplished at death but some predetermined time when God in Christ will appear and Call out and Raise up Believers and their Bodies. 1Cor15:24-25,51-54, Heb9:28.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/05/School-of-Ministry-lLesson-4-1.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/mf4ZajvwncU?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 4,
                'lesson_duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Five Tests of True Salvation',
                'slug' => Str::slug('Five Tests of True Salvation'),
                'subtitle' => 'Five Tests of True Salvation',
                'lesson_note' => 'We have now outlined what the Gospel is and the fullness of Salvation through our Lord Jesus Christ. We have also examined whether Salvation can be lost or not. Due to a lot of confusion in the Church because of low Biblical literacy, it is important that Scriptures answer the queries and questions in our minds. We think it is important at this stage in our Foundation lessons to outline who or what a true Christian looks like. We will outline 5 Biblical facts that every genuine Believer should routinely be able to answer to. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/05/School-of-Ministry-lLesson-5.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/ULjO37mm15A?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 5,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'You are Spirit!/Your Spirit is Sinless',
                'slug' => Str::slug('You are Spirit!/Your Spirit is Sinless'),
                'subtitle' => 'You are Spirit!/Your Spirit is Sinless',
                'lesson_note' => 'In this study we shall be looking into one of the most amazing discoveries and benefits of the New Birth and Salvation. It is the fantastic reality that the Human Spirit is regenerated, given Eternal Life and becomes Born Again. In this Lesson we are going to therefore focus on the superior power and abilities of the Resurrected spiritual life. If any man be in Christ, He is a NEW CREATION….KTISIS Man is tripartite, meaning that he has three parts: ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/05/School-of-Ministry-lLesson-6.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/0MDf-fWBOso?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 6,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'You are Spirit!/Your Spirit is Sinless',
                'slug' => Str::slug('You are Spirit!/Your Spirit is Sinless-1'),
                'subtitle' => 'You are Spirit!/Your Spirit is Sinless',
                'lesson_note' => 'In this study we shall be looking into one of the most amazing discoveries and benefits of the New Birth and Salvation. It is the fantastic reality that the Human Spirit is regenerated, given Eternal Life and becomes Born Again. In this Lesson we are going to therefore focus on the superior power and abilities of the Resurrected spiritual life. If any man be in Christ, He is a NEW CREATION….KTISIS Man is tripartite, meaning that he has three parts:  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/05/School-of-Ministry-lLesson-6.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/0MDf-fWBOso?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 7,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'How to Walk in the Spirit',
                'slug' => Str::slug('How to Walk in the Spirit'),
                'subtitle' => 'How to Walk in the Spirit',
                'lesson_note' => 'Now that we have established the Biblical fact that we are Spirit having a Soul and living in a Body, we can now contextually study on the subject of The Holy Spirit. These series of foundational truths about the New Birth and the regenerated Human Spirit are very powerful in our understanding and application of the full benefits of Salvation in Christ.  The role and Person of the Spirit of Christ is another amazing aspect of what we received when we became Born Again. Christ in You, God with and in You are themes that flow from the ‘Well of Salvation’ and we need to walk in the fullness of revelation of what these mean to us.  When our Lord introduces the Holy Spirit to His Disciples, this account is captured in John’s Gospel and it tells us a lot.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/06/School-of-Ministry-lLesson-8.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/dTg4jaaeInA?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 8,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'The Living Word',
                'slug' => Str::slug('The Living Word'),
                'subtitle' => 'The Living Word',
                'lesson_note' => 'We will now step further into the fundamentals by looking at the very important subject of the Bible also called the Word or Scriptures. The crucial question we will answer in this study is “Are the Scriptures the inspired Word of God or historic documents written by men?” The way you answer this query will determine your Christianity and foundation of belief. There is no middle ground on this matter as some would like. There are Believers who take the stance that some parts of the Bible are from God and other parts from Men.  There are those who hold to the fact that the ancient manuscripts are authentic artefacts from antiquity which contain great depths of insight and knowledge about history and archaeology but stop short of labelling them as divinely inspired.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/06/School-of-Ministry-lLesson-9.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/bHWQcYS2Juk?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 9,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'How the Scriptures were Written and Compiled',
                'slug' => Str::slug('How the Scriptures were Written and Compiled'),
                'subtitle' => 'How the Scriptures were Written and Compiled',
                'lesson_note' => 'We would be approaching this ma er from a spiritual context as well as from pragma c empirical research. We need to be able to intelligently defend our faith even though our salva on is not based on mental cogni ve founda ons. First of all let us understand one key factor about God; HE IS SOVEREIGN! Proverbs 16:9 A man’s heart plans his way, But the LORD directs his steps Proverbs 19:21 There are many plans in a man’s heart, Nevertheless the LORD’s counsel—that will stand. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/07/School-of-Ministry-lLesson-10.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/PE_ofqsw-mk?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 10,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'The Power & Impact of the Word',
                'slug' => Str::slug('The Power & Impact of the Word'),
                'subtitle' => 'The Power & Impact of the Word',
                'lesson_note' => 'Now that we have established the fact and reality that the Bible is the Word of God, we will now examine the impact and effects of the Word.  Hebrews 4:12 12 For the word of God is living and powerful, and sharper than any two-edged sword, piercing even to the division of soul and spirit, and of joints and marrow, and is a discerner of the thoughts and intents of the heart. 13 And there is no creature hidden from His sight, but all things are naked and open to the eyes of Him to whom we must give account.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/07/School-of-Ministry-lLesson-11.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/IkXGk8IJ9w0?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 11,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => ' Eschatology: The Context to the End-Times',
                'slug' => Str::slug(' Eschatology: The Context to the End-Times'),
                'subtitle' => 'Eschatology: The Context to the End-Times',
                'lesson_note' => 'We are going to attempt the impossible; to discuss and study Eschatology whilst avoiding controversy! If there was ever any subject that divides opinion, it is the study of The End Times.  Everybody who has ever lived will end up in ETERNITY. This is the Endgame for all of humanity and the Scriptures have a lot to say about this final destination for all.  All of time will be swallowed up by Eternity in the end. Our God dwells in this dimension and therefore this is where we will start our study. To understand the End, we have to start at The Beginning!  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/07/School-of-Ministry-Eschatology-Lesson-13.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/9sqDN7DbQ8Q?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 13,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Signs of the End-times',
                'slug' => Str::slug('Signs of the End-times'),
                'subtitle' => 'Signs of the End-times',
                'lesson_note' => 'As stated in lesson 13, the key topics include, The Coming of Christ, The Signs of The Times, The Resurrection, The Millennium, The Judgements and The Eternal Kingdom.  What is a sign? A Biblical Sign is an event, a person, a symbol, an object or a place whose existence indicates God’s plan for the future. Our Lord Jesus outlined in the Scriptures that there will be many signs', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/07/School-of-Ministry-Signs-of-The-Times-Lesson-14.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/R2hv6XiLgQA?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 14,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'The End Times',
                'slug' => Str::slug('The End Times'),
                'subtitle' => ' The End Times',
                'lesson_note' => '', // short note from the pdf
                'lesson_content' => '', //pdf link
                'lesson_video' => ' https://youtube.com/live/dLVNWZLQK30?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 15,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'The Cost Of Discipleship',
                'slug' => Str::slug('The Cost Of Discipleship'),
                'subtitle' => 'The Cost Of Discipleship',
                'lesson_note' => 'Welcome to the start of a new course and level. In the first season, we laid out a foundation of doctrine and belief of the basics. That is why it is called FOUNDATION School.  There are five levels or schools within the School of Ministry: • Foundation School • Discipleship School • Ministry School • Leadership School • Commissioning We will travel together through each level with the goal of finishing at the point where each delegate is launched into the place of their Grace, Calling and Season. For each person this will be unique and no two people will have an identical route or journey. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/09/SOM-Discipleship-Lesson-1.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/ABrCYTVuKeI',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 1,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => ' Are You A Disciple?',
                'slug' => Str::slug('Are You A Disciple?'),
                'subtitle' => 'Are You A Disciple?',
                'lesson_note' => 'The definition and description of what a true follower of Jesus is will help us all to answer this question truthfully in our hearts and minds. The role of this teaching and lesson is not an academic one. It is not primarily to provide information either. The goal is a change of heart, habits and behaviour.  One of the ways the Scriptures describe disciples is using the word SERVANT  24 “A disciple is not above his teacher, nor a servant above his master. 25 It is enough for a disciple that he be like his teacher, and a servant like his master Matthew 10:24-25 Our Lord Himself uses this word a lot in His parables and preaching. This is then picked up by His disciples to describe themselves  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/09/SOM-Discipleship-Lesson-2.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/ABrCYTVuKeI',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 2,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => ' The Altar',
                'slug' => Str::slug(' The Altar'),
                'subtitle' => ' The Altar',
                'lesson_note' => 'The Disciple is a follower of Christ in all seasons, situations, in private and public; in everything and everywhere. The underlying principle that made our Lord overcome all the way to the Cross is what we will dwell on in this chapter.  There is an inherent driving energy that distinguishes the true believer from the religious Church attender. We will examine this key and aim to enable the reader to become an Overcomer and constantly victorious in all areas of life and faith. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/09/SOM-Discipleship-Lesson-3-The-Altar.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/mSeYBMhLva8?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 3,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'course_id' => 2,
                'title' => 'The Altar 2',
                'slug' => Str::slug(' The Altar 2'),
                'subtitle' => ' The Altar 2',
                'lesson_note' => 'We looked at the example of our Lord Jesus in His application of this Altar principle. His prayer life and communion with The Father is the model for the Follower of Christ. Now it came to pass, as He was praying in a certain place, when He ceased, that one of His disciples said to Him, “Lord, teach us to pray, as John also taught his disciples.” Luke 11:1 There was something the Disciples saw in the way and manner that our Lord prayed which prompted the request that He should teach them how to do the same', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/09/SOM-Discipleship-Lesson-4-The-Altar-2.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/mw5y3JoN-bk?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 4,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Meditation',
                'slug' => Str::slug('Meditation'),
                'subtitle' => 'Meditation',
                'lesson_note' => 'Now we move into the interesting phase of our discipleship program beginning with the fascinating subject of Meditation. This is becoming a lost art within the Church primarily due to time poverty and attention deficit syndrome in this generation. We will look at how to meditate on two levels; mental and spiritual. To be very effective in your Christian walk, you have to operate on both levels efficiently. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2020/10/SOM-Discipleship-Lesson-5-MEDITATION.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/LBQNAD5hlh4?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 5,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Meditation & Intercession',
                'slug' => Str::slug('Meditation & Intercession'),
                'subtitle' => 'Meditation & Intercession',
                'lesson_note' => 'The role of meditation in the life of the Believer is the bridge between the heavenly realm and the earth. Meditation enables the follower of Christ access the spirit of the Word and mind of the Spirit.  As the Christian understands God’s heart and will, this leads to intercession and prayer to birth into the physical what exists in the spiritual.   ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-6-MEDITATION-INTERCESSION2198-1.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/sV7tYDkuemA?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 6,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => ' Intercession',
                'slug' => Str::slug(' Intercession'),
                'subtitle' => ' Intercession',
                'lesson_note' => 'As we progress with our journey into the life of the Believer, we come to a very important and pivotal subject related to almost everything we have touch on so far. The matter of INTERCESSION is such a crucial one our Lord taught on this extensively.   ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-7-INTERCESSION2129-1.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/-7WGJ77MmjA?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 7,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Spirit-Filled Life',
                'slug' => Str::slug('Spirit-Filled Life'),
                'subtitle' => 'Spirit-Filled Life',
                'lesson_note' => 'We will be examining and learning about the equipping that comes through the Holy Spirit. The biblical Disciple does not fit completely into any of the current church denominations on the Earth. The only place where the follower of Christ can be fully aligned is with the Scriptures. Therefore these series of teachings do not ascribe to any tradition except the Bible. To understand our progression, we began by teaching on the importance of prayer and having an altar. We went on to examine the need to have not just the discipline of prayer but the space for meditation where scripture and the heart of God is revealed. The key common denominator in all of this is the Person of The Holy Spirit.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-8-SPIRIT-FILLED-LIFE2125-1.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/-7WGJ77MmjA?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 8,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Activation Of Gifts',
                'slug' => Str::slug('Activation Of Gifts'),
                'subtitle' => 'Activation Of Gifts',
                'lesson_note' => ' ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-9-ACTIVATION-OF-GIFTS2124.pdf', //pdf link
                'lesson_video' => ' https://youtube.com/live/EXg_O5X3BU0?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 9,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Fruits Of The Spirit',
                'slug' => Str::slug(' Fruits Of The Spirit'),
                'subtitle' => 'Fruits Of The Spirit',
                'lesson_note' => 'We have looked at the gifts of the Spirit which flow out from God as the source. We will now look at the fruits of the spirit, which flow out from the born-again inner man of the Believer. The life of every true disciple of Christ should bear fruit abundantly. It is not normal for a Believer to be barren.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-11-Fruits-Of-The-Spirit2118.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/8V09scfvC-8?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 11,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Fruits Of The Spirit 2',
                'slug' => Str::slug('Fruits Of The Spirit 2'),
                'subtitle' => 'Fruits Of The Spirit 2',
                'lesson_note' => 'This is such a compound element of the result of our life in Christ to the extent that we can actually spend a whole section on this FRUIT alone. Some teachers believe that LOVE is another word for all the other fruits of the spirit. I do not feel that is the case but there are several overlaps. It’s not worth splitting hairs over so we will try to examine each fruit', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-12-Fruit-Of-The-Spirit.2117.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/8V09scfvC-8?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 12,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'The Making Of Disciples',
                'slug' => Str::slug('The Making Of Disciples'),
                'subtitle' => 'The Making Of Disciples',
                'lesson_note' => 'In creating you, God made a masterpiece. So, as you manifest who you are in Him, You will automatically witness to the existence of God and His intelligent and intentional design. 20 For ever since the creation of the world His invisible attributes, His eternal power and divine nature, have been clearly seen, being understood through His workmanship [all His creation, the wonderful things that He has made], so that they [who fail to believe and trust in Him] are without excuse and without defence. Rom 1:20 10 For we are His workmanship [His own master work, a work of art], created in Christ Jesus [reborn from above—spiritually transformed, renewed, ready to be used] for good works, which God prepared [for us] beforehand [taking paths which He set], so that we would walk in them [living the good life which He prearranged and made ready for us]. Eph 2:10', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Discipleship-Lesson-13-THE-MAKING-OF-DISCIPLES2115.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/WLG24d7KE7s?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 13,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'Bearing Fruit',
                'slug' => Str::slug('Bearing Fruit'),
                'subtitle' => 'Bearing Fruit',
                'lesson_note' => 'This session is about YOU, yes YOU! It could be a turning point in your destiny and life if you catch the essence of what this message from Jesus means for you and your life. The main reason why this is not taught properly in the contemporary church is because of sin, pride and the structure of the church generally. If you read very carefully the New Testament and how church should operate, you will see a number of discrepancies.  I am not saying everything is wrong and corrupt, but I believe we need to stay with the VISION of Jesus and how you can implement this with your life.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/DISCIPLESHIP-14-BEARING-FRUIT2119-1.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 14,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => ' The World Context',
                'slug' => Str::slug(' The World Context'),
                'subtitle' => ' The World Context',
                'lesson_note' => 'Watching the opening sequence of the film Saving Private Ryan was a brutal experience. The Director Steven Spielberg sort to capture the reality of war and boy, did he capture it!  We are in a spiritual war and the enemy is taking no prisoners. The battle for the souls of men is intense. Paul captures this reality through Scripture, and he is very graphic in his description.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Ministry-School-Lesson-1.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/AVzxLsCxjnM?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 1,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => ' The Kingdom of God',
                'slug' => Str::slug(' The Kingdom of God'),
                'subtitle' => ' The Kingdom of God',
                'lesson_note' => 'One of the most misunderstood themes and realities in the Scriptures is that of The Kingdom of God. Ask most Christians what this means, and they will flounder in their answer. Last week we sought to outline the context of the Believer in the world leaving some feeling somewhat vulnerable and exposed.  Today we will seek to explore the protective support matrix called The Kingdom of God which will help to reassure Christians that they are not alone in the World. In fact, a proper understanding of the Kingdom will embolden many to step out into the world knowing that they have nothing to fear.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/01/SOM-Ministry-School-Lesson-2.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/eAJ8LANK8rI?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 2,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'True Ministry',
                'slug' => Str::slug('True Ministry'),
                'subtitle' => 'True Ministry',
                'lesson_note' => 'We have now set the stage to begin to understand the context and placement of real ministry from lessons one and two. We know that we are in the world but not of the world even though we are human beings. By becoming Christians, we have been translated into a matrix called the Kingdom of God. The primary and sole agenda of God is not to bless us so that we can have good and successful lives and blend in with the world. The sole reason why we are saved is that we have a reconciled relationship with God first and then lovingly call others back into a relationship with the Lord. This is our sole purpose for living, our higher goal which should drive everything, yes everything we do. If we lose sight of this, we lose our ‘saltiness’ and we become of no use to God and the Kingdom. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/02/SOM-Ministry-School-lesson-3-Ministry.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/MkWdtvQfzQk?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 3,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'Ministry Gifts',
                'slug' => Str::slug('Ministry Gifts'),
                'subtitle' => 'Ministry Gifts',
                'lesson_note' => 'In lesson three, we began the introduction to ministry gifts. We have now set the stage to begin to understand the context and placement of real ministry from lessons one and two. We know that we are in the world but not of the world even though we are human beings. By becoming Christians, we have been translated into a matrix called the Kingdom of God. So, in alphabetical order, the mentioned gifts of ministry in the NT are as follows: ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/02/SOM-Ministry-School-Lesson-4.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/y-6-yuGqr4k?feature=share ',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 4,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'The Church',
                'slug' => Str::slug('The Church'),
                'subtitle' => 'The Church',
                'lesson_note' => 'Following on from our previous four classes, where we have looked at the context of the Kingdom versus the World and True Ministry along with Ministry Gifts, we will now examine The Church. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/02/SOM-Ministry-School-Lesson-5.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/j93q5DuJBSw?feature=share ',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 5,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'The Priesthood of All Believers',
                'slug' => Str::slug('The Priesthood of All Believers'),
                'subtitle' => 'The Priesthood of All Believers',
                'lesson_note' => ' God’s vision and agenda for His Church lies very heavily on the focus of this study. It is a principle and reality very close to the Lord’s heart which is THE PRIESTHOOD OF ALL BELIEVERS. The main act and actor here is YOU! Everyone reading this writing, everyone who is vocational, professional; whatever your job, age, gender or location, if you are a Christian, then you are in Ministry! ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/02/SOM-Ministry-School-Lesson-6.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/wNQDY63xFbc?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 6,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'The Minister Of The Gospel',
                'slug' => Str::slug('The Minister Of The Gospel'),
                'subtitle' => 'The Minister Of The Gospel',
                'lesson_note' => 'In this series, we have looked at the Kingdom, the World, and the Church. We have reexamined what the Scriptures say about the Believer and this is the conclusion: IF YOU ARE A CHRISTIAN THEN YOU ARE A MINISTER OF THE GOSPEL OF RECONCILIATION AND OF YOUR GIFTS. We will now focus on what that means according to Scripture and not according to church traditions.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/03/SOM-Ministry-School-Lesson-7.pdf', //pdf link
                'lesson_video' => 'https://youtube.com/live/YIzAc9vmqao?feature=share',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 7,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'How To Function As A Minister (Part One)',
                'slug' => Str::slug('How To Function As A Minister Part One'),
                'subtitle' => 'How To Function As A Minister (Part One)',
                'lesson_note' => 'We have been examining the powerful principle that every Disciple of Christ is a Minister. The myriad of church members who seat in the pews every Sunday are called by the scriptures, Ministers of Reconciliation, that is The Gospel. Every single person has a God given gift or set of gifts, that have to be deplored for the Church and the world in which they live.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/03/SOM-Ministry-School-Lesson-8.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 8,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'How To Function As A Minister (Part Two)',
                'slug' => Str::slug('How To Function As A Minister Part Two'),
                'subtitle' => 'How To Function As A Minister (Part Two)',
                'lesson_note' => 'We have looked at the fact that the Bible calls every Believer a Minister of Reconciliation. We have also examined that biblically; all Christians are able to function prophetically and are called Priests and Kings. For the sake of easy remembrance, we have used the terms Prophet, Priest and Prince.   ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/03/SOM-Ministry-School-Lesson-9-converted.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 9,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'How To Function As A Minister (Part Three)',
                'slug' => Str::slug('How To Function As A Minister Part Three'),
                'subtitle' => 'How To Function As A Minister (Part Three)',
                'lesson_note' => 'This is the part three of our study on the functions of the Minister. As we have already examined but reiterate here, EVERY BELIEVER IS A MINISTER! We will not look at one of the key areas where there have been gaps in the mindset and teaching of the Church. Somehow the prevailing attitude is that Monday is not a Holy as Sunday.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/03/SOM-Ministry-School-Lesson-10.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 10,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => 'The Ministry Blueprint',
                'slug' => Str::slug('The Ministry Blueprint'),
                'subtitle' => 'The Ministry Blueprint',
                'lesson_note' => 'I was sleeping but awake, I was awake but sleeping. I kept hearing the Spirit say MINISTRY BLUEPRINT. The revelation was unveiled in my spirit and it became clearer what the Lord was saying and revealing.  We will examine this Biblical structure and strategy as presented in Scripture so that we are balanced and strong in the Will of God for His Church. YOU ARE A MINISTER. This definition should reverberate throughout the Body of Christ for EVERY Believer in these Last Days. We have looked at the fact that the Bible calls every Believer a Minister of Reconciliation. We have also examined that biblically; all Christians are able to function prophetically and are called Priests and Kings. For the sake of easy remembrance, we have used the terms Prophet, Priest and Prince.   ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/04/SOM-Ministry-School-Lesson-11.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 11,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'title' => ' 7 Principles Of Ministry',
                'slug' => Str::slug('7 Principles Of Ministry'),
                'subtitle' => '7 Principles Of Ministry',
                'lesson_note' => 'As we come to the closing lesson of Ministry School and start preparing for LEADERSHIP SCHOOL, we will now attempt to encapsulate what Ministry entails within seven key principles. This list of points is by no means exhaustive; however, they help to focus the mind on what ministry means and what is important.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/04/SOM-Ministry-School-Lesson-12.pdf', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 12,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Vision/Intro To Leadership School',
                'slug' => Str::slug('Vision/Intro To Leadership School'),
                'subtitle' => 'Vision/Intro To Leadership School',
                'lesson_note' => 'The Church is called to equip the Saints for the work of the ministry. Every Believer growing into maturity and being fruitful in their call is the attainable goal. The vision of this school of ministry is exactly that: Raising a million Christlike Believers for the Kingdom of God. The School of Ministry is designed as a powerful word-based teaching ministry which employs practical, dynamic and socially relevant training. This will be presented with creativity and excellence with the aim of transforming Believers into mature Disciples and then into effective, socially engaged Ministers within the Kingdom of God and the World at large. The School Ministry is made up of Five Levels. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/04/SOM-Ministry-VISION-2021.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/rGpPS9pu2N4 ',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 1,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Leadership',
                'slug' => Str::slug('Leadership'),
                'subtitle' => 'Leadership',
                'lesson_note' => 'The world we live in is messed up and full of billions of people searching for meaning in life. There is a universal search for Leaders who can bring real change and transformation of hearts and minds. Inner change leads to external fruit. Despite advancement in science and technology, the human condition seems to be getting worse. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/06/SOM-LEADERSHIP-SCHOOL-1.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/rGpPS9pu2N4 ',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 2,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Definitions',
                'slug' => Str::slug('Definitions'),
                'subtitle' => 'Definitions',
                'lesson_note' => 'This Leadership program is a very different type of series. It is firmly set within the context of Scripture and patterned after the greatest Leader to walk the Earth – Jesus Christ our Lord. There will be some crossovers with classic leadership corporate training, and these will be where the world has adopted Kingdom principles or Wisdom from God. The teachings are aimed at your HEART first. The principles will touch your CORE or Spiritual essence and then spill over into your mental and cognitive faculties. The key aim is allowing your inner life to govern your outer mental and physical life so that you have balance and equilibrium.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/06/SOM-LEADERSHIP-SCHOOL-2.docx.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/Vt5QChmjXVA',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 3,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => ' The Goal Of Leadership',
                'slug' => Str::slug(' The Goal Of Leadership'),
                'subtitle' => ' The Goal Of Leadership',
                'lesson_note' => 'The definition of a Leader within the Kingdom was clearly outlined in the last session. If we are to begin with the end in mind, then this lesson will help us do that. Athletes enter the Olympic games with the end goal of a Medal in mind. Women endure the hardship of labour because of the promised joy of a baby. Students enrol in rigorous university programs with the aim of obtaining a degree. The promise makes the process worthwhile. The prize justifies the price. Everyone is a MINISTER and a LEADER in the Kingdom, in one capacity or the other. We are called to help people discover God and His agenda for their lives. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/06/SOM-LEADERSHIP-SCHOOL-3.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/FW7vdPbBuO8',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 4,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Ego & Self',
                'slug' => Str::slug('Ego & Self'),
                'subtitle' => 'Ego & Self',
                'lesson_note' => 'As we continue our journey of discovery into Kingdom Leadership dynamics and how to apply these to our lives, we come to a very important subject. The title of our discussion is SELF and EGO. So crucial is this matter that we will look at this over two lessons. Once we crack this conundrum of SELF, we can then build on this foundational understanding, the other principles of practical applications of Leadership. Prepare yourself for some reflection and evaluation that could become challenging and uncomfortable!  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/06/SOM-LEADERSHIP-SCHOOL-4.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/yLTzlh8fy4o',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 5,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Ego & Self Pt. 1',
                'slug' => Str::slug('Ego & Self Pt. 1'),
                'subtitle' => 'Ego & Self Pt. 1',
                'lesson_note' => ' In the first part of this subject we looked at the definition of Self and its expression. It is no exaggeration to say that the STRONGEST AND MOST ENDURING ENEMY OF YOUR LIFE AND DESTINY IS SELF. The sooner you realise this, the quicker you will take a closer look at yourself and your actions.  In this lesson, we will examine the biblical and only permanent way of overcoming the ego and self. Let us start by listing some statements that reflect the male and female ego.', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/07/SOM-LEADERSHIP-SCHOOL-5.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/7lEKy1vtLBI',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 6,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Ego & Self Pt. 2 ',
                'slug' => Str::slug('Ego & Self Pt. 2 '),
                'subtitle' => 'Ego & Self Pt. 2 ',
                'lesson_note' => 'In the first part of this subject we looked at the definition of Self and its expression. It is no exaggeration to say that the STRONGEST AND MOST ENDURING ENEMY OF YOUR LIFE AND DESTINY IS SELF. The sooner you realise this, the quicker you will take a closer look at yourself and your actions.  In this lesson, we will examine the biblical and only permanent way of overcoming the ego and self. Let us start by listing some statements that reflect the male and female ego.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/07/SOM-LEADERSHIP-SCHOOL-5.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/zCPhAAuYC4U',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 7,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'How To Develop A Strong Spirit',
                'slug' => Str::slug('How To Develop A Strong Spirit'),
                'subtitle' => 'How To Develop A Strong Spirit',
                'lesson_note' => 'We have spent a few sessions addressing, defining, and looking at the concept of Self and Ego. We will now spend some time examining the solution which comes by allowing the spirit to override the flesh effectively. Those who want to be effective for God and His Kingdom operate these principles in their lives. The real leaders in the Kingdom are those who walk closely with the Lord and Obey His instructions to them personally.  The main aim through this session is to examine, understand and action how our spirit in collaboration with the Holy Spirit overrides, and dethrones the dominance of self and the flesh in our lives; enabling us to bear everlasting fruit to the Glory of God.  ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/07/SOM-LEADERSHIP-SCHOOL-7.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/tIMMGbLInI4',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 8,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Wisdom',
                'slug' => Str::slug('Wisdom'),
                'subtitle' => 'Wisdom',
                'lesson_note' => 'As we come to the final sessions of our Leadership summer program, we will round up with the subject and concept of Wisdom. The reason for this is that this Gift and its applications apply to all areas of life and is a fitting addendum to all that we have been learning so far. There are broadly speaking two types of wisdom: Human wisdom and Divine Wisdom. The Bible is clear about the distinction between the two: ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/07/SOM-LEADERSHIP-SCHOOL-8.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/kDZrjKY_3eg',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 9,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Wisdom For Living',
                'slug' => Str::slug('Wisdom For Living'),
                'subtitle' => 'Wisdom For Living',
                'lesson_note' => 'In this penultimate session, we are going to wade through some principles that apply to and work for Leaders in all cultures, ages and everywhere. A principle or precept is like a LAW which does not care about colour, class, or context, it will deliver for whoever uses it. A person who operates principles is wise than the person who operates by facts.  Mile Munroe. ', // short note from the pdf
                'lesson_content' => 'https://citychapel.org.uk/wp-content/uploads/2021/08/SOM-LEADERSHIP-SCHOOL-9.pdf', //pdf link
                'lesson_video' => 'https://youtu.be/hrc0W8FmqiA',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 10,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title' => 'Unlocking The Power In The Word',
                'slug' => Str::slug('Unlocking The Power In The Word'),
                'subtitle' => 'Unlocking The Power In The Word',
                'lesson_note' => ' ', // short note from the pdf
                'lesson_content' => '', //pdf link
                'lesson_video' => '',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 11,
                'lesson_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        Lesson::insert($lessons);
    }
}
