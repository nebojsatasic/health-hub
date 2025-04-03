<?php

class Pages extends Controller
{
    /**
     * Load Home page
     */
    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'HealthHub',
            'description' => 'A healthy lifestyle is about having a healthy diet, active lifestyle and caring for your mental wellbeing. Being healthy or leading a healthy lifestyle is more than just keeping yourself from falling sick. The World Health Organisation (WHO) defines "health" as complete physical, mental and social well-being, rather than simply the absence of disease or illness. Besides keeping yourself free from diseases, good health or healthy living encompasses many other areas, which include physical health, mental health and health management. Every area is important and cannot be neglected for you to achieve better health. You will see that with a few simple tips, you can learn to manage the different aspects of health, lead a more fulfilling and active lifestyle and keep diseases at bay.'
        ];

        $this->view('pages/index', $data);
    }

    /**
     * Load About Us page
     */
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'HealthHub is the national platform for digital health that can be conveniently accessed by everyone who wants to view evidence-based health and wellness information.'
        ];

        $this->view('pages/about', $data);
    }
}