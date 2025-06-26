<?php

namespace App\Observers;

use App\Models\{Compaign, EmailFormat};

class CampaignObserver
{
    /**
     * Handle the Compaign "created" event.
     */
    public function created(Compaign $compaign): void
    {

        $subject = 'Potential for expansion abroad';
        $description = "Good morning FIRST_NAME,\n\n" .
            "I hope you had a wonderful summer holiday. I noticed that you have posted over SNIPPET1 ads in SNIPPET2. This prompted me to ask the following question.\n\n" .
            "Has the CPA per ad increased for you in recent months? And could you be missing out on markets that might be very interesting for COMPANY's product? We create ad creatives for Meta and TikTok in eight different languages. We guarantee that new content is always being created and tested.\n\n" .
            "Based on your products, I see a few opportunities. I'd love to show you how you can advertise effectively in multiple countries in the right language without spending more on content. Shall we schedule a brief 30-minute online call? I can show you the details.\n\n" .
            "Would next Thursday, late afternoon work? How about 3:00 p.m.?";


        EmailFormat::create([
            'user_id' => $compaign->user_id,
            'compaign_id' => $compaign->id,
            'subject' => $subject,
            'description' => $description,
        ]);

        // Second Email Format (change content as needed)
        $subject2 = 'Expanding Your Reach with Multi-Language Ads';
        $description2 = "Hi FIRST_NAME,\n\n" .
            "I came across your ads (SNIPPET1 in SNIPPET2) and was curious — have you ever tried scaling to international markets?\n\n" .
            "Our team specializes in creating tailored Meta and TikTok creatives in 8 languages. Imagine testing fresh content continuously without the extra production hassle.\n\n" .
            "COMPANY's products seem perfect for this. If you're open to exploring more reach without increasing ad spend, let’s talk.\n\n" .
            "Would next Thursday at 3:00 p.m. suit you for a short intro call?";

        EmailFormat::create([
            'user_id' => $compaign->user_id,
            'compaign_id' => $compaign->id,
            'subject' => $subject2,
            'description' => $description2,
        ]);


        $subject3 = 'Expanding Your Reach with Multi-Language Ads';
        $description3 = "Hi FIRST_NAME,\n\n" .
            "I came across your ads (SNIPPET1 in SNIPPET2) and was curious — have you ever tried scaling to international markets?\n\n" .
            "Our team specializes in creating tailored Meta and TikTok creatives in 8 languages. Imagine testing fresh content continuously without the extra production hassle.\n\n" .
            "COMPANY's products seem perfect for this. If you're open to exploring more reach without increasing ad spend, let’s talk.\n\n" .
            "Would next Thursday at 3:00 p.m. suit you for a short intro call?";

        EmailFormat::create([
            'user_id' => $compaign->user_id,
            'compaign_id' => $compaign->id,
            'subject' => $subject2,
            'description' => $description2,
        ]);
    }

    /**
     * Handle the Compaign "updated" event.
     */
    public function updated(Compaign $compaign): void
    {
        //
    }

    /**
     * Handle the Compaign "deleted" event.
     */
    public function deleted(Compaign $compaign): void
    {
        //
    }

    /**
     * Handle the Compaign "restored" event.
     */
    public function restored(Compaign $compaign): void
    {
        //
    }

    /**
     * Handle the Compaign "force deleted" event.
     */
    public function forceDeleted(Compaign $compaign): void
    {
        //
    }
}
