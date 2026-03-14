const eventsData = [
    // 1. Academic & Educational Events
    {
        id: "acad-1",
        category: "Academic",
        title: "International Conference on Education Policy, Globalization and Poverty",
        location: "Colombo",
        date: "20 March 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/lecture.jpeg?w=4480&h=2016"
    },
    {
        id: "acad-2",
        category: "Academic",
        title: "Career Fair CODE GEN",
        location: "University of Kalaniya",
        date: "25 March 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair%20code%20gen.jpg?w=4593&h=2844"
    },
    {
        id: "acad-3",
        category: "Academic",
        title: "International Conference on Smart Cities & Transportation Engineering",
        location: "Colombo",
        date: "25 March 2026",
        image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "acad-4",
        category: "Academic",
        title: "JOB Fair",
        location: "Colombo",
        date: "25 March 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/job%20fair.jpg?w=810&h=523"
    },
    {
        id: "acad-5",
        category: "Academic",
        title: "International Conference on Assessment and Evaluation in Curriculum Design",
        location: "Colombo",
        date: "25 March 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/meetings.jpg?w=1200&h=800"
    },
    {
        id: "acad-6",
        category: "Academic",
        title: "International Conference on Work-Based Learning & Vocational Practices",
        location: "Colombo",
        date: "25 March 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair.jpg?w=5330&h=3553"
    },
    {
        id: "acad-7",
        category: "Academic",
        title: "22nd International Conference on Business Management",
        location: "Nugegoda",
        date: "2026 (annual conference)",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/conference.jpg?w=2048&h=1365"
    },
    {
        id: "acad-8",
        category: "Academic",
        title: "International Research Conference on Management & Finance",
        location: "Colombo",
        date: "27 November 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/confarance1.jpg?w=960&h=539&ar=960%3A539"
    },
    {
        id: "acad-9",
        category: "Academic",
        title: "Professional Event Management Training Program",
        location: "Colombo",
        date: "31 March 2026",
        image: "https://images.unsplash.com/photo-1540575861501-7ad05823c9f5?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "acad-10",
        category: "Academic",
        title: "SLASSCOME Profectional Skills Workshop",
        location: "Kandy – Earl’s Regency Hotel",
        date: "11–12 December 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/SLASSCOM-Workshop.jpeg?w=782&h=784"
    },

    // 2. Cultural & Entertainment Events
    {
        id: "cult-1",
        category: "Cultural",
        title: "Play Expo & Colombo Comic Expo",
        location: "Colombo – SECC",
        date: "10–11 January 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/comic.jpg?w=600&h=338"
    },
    {
        id: "cult-2",
        category: "Cultural",
        title: "Kandy Esala Perahera",
        location: "Kandy",
        date: "July–August annually",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/esala%20perahera.jpg?w=1024&h=1024"
    },
    {
        id: "cult-3",
        category: "Cultural",
        title: "Galle Literary Festival",
        location: "Galle Fort",
        date: "January annually",
        image: "https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-4",
        category: "Cultural",
        title: "Navam Perahera",
        location: "Colombo – Gangaramaya",
        date: "February annually",
        image: "https://images.unsplash.com/photo-1574347717088-348243beea4d?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-5",
        category: "Cultural",
        title: "Colombo International Book Fair",
        location: "BMICH, Colombo",
        date: "September annually",
        image: "https://images.unsplash.com/photo-1524334228333-0f6db392f8a1?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-6",
        category: "Cultural",
        title: "Kala Pola Art Festival",
        location: "Colombo",
        date: "February annually",
        image: "https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-7",
        category: "Cultural",
        title: "Music Festival",
        location: "Kelaniya",
        date: "January",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/music%20concert.jpg?w=600&h=400"
    },
    {
        id: "cult-8",
        category: "Cultural",
        title: "Hikkaduwa Beach Fest",
        location: "Hikkaduwa",
        date: "April",
        image: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-9",
        category: "Cultural",
        title: "Vesak Festival Sri Lanka",
        location: "Islandwide",
        date: "May",
        image: "https://images.unsplash.com/photo-1540575861501-7ad05823c9f5?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-10",
        category: "Cultural",
        title: "Nallur Festival",
        location: "Jaffna",
        date: "August",
        image: "https://images.unsplash.com/photo-1510002824700-1c944eb79815?auto=format&fit=crop&q=80&w=800"
    },

    // 3. Sports Events
    {
        id: "spor-1",
        category: "Sports",
        title: "International Surfing Championships",
        location: "Arugam Bay",
        date: "2026 (season event)",
        image: "https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "spor-2",
        category: "Sports",
        title: "Champion Track & Field Meet",
        location: "Colombo",
        date: "28–29 March 2026",
        image: "https://images.unsplash.com/photo-1526676037777-05a232554f77?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "spor-3",
        category: "Sports",
        title: "Sri Lanka Open Chess Championship",
        location: "Colombo",
        date: "September 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/WhatsApp%20Image%202026-03-15%20at%2001.30.02.jpeg?w=736&h=1308&ar=736%3A1308"
    },
    {
        id: "spor-4",
        category: "Sports",
        title: "Legends Tour Golf Tournament",
        location: "Royal Colombo Golf Club",
        date: "25–31 January 2026",
        image: "https://images.unsplash.com/photo-1535131749006-b7f58c99034b?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "spor-5",
        category: "Sports",
        title: "ICC Men's T20 World Cup 2026",
        location: "Colombo & Kandy",
        date: "Feb–Mar 2026",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/cricket.avif?w=480&h=360"
    },
    {
        id: "spor-6",
        category: "Sports",
        title: "Inter-University Games",
        location: "Various universities",
        date: "September",
        image: "https://images.unsplash.com/photo-1511252810826-a6e74f4ad35a?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "spor-7",
        category: "Sports",
        title: "National School Games Athletics",
        location: "Sugathadasa Stadium",
        date: "October",
        image: "https://images.unsplash.com/photo-1533560904424-a0c61dc306fc?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "spor-8",
        category: "Sports",
        title: "Colombo Marathon",
        location: "Colombo",
        date: "October",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/marathon.jpg?w=1440&h=958"
    },
    {
        id: "spor-9",
        category: "Sports",
        title: "SLT Esport King",
        location: "Islandwide Online",
        date: "June–August",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/gaming.jpg?w=1000&h=764"
    },
    {
        id: "spor-10",
        category: "Sports",
        title: "National Netball Championship",
        location: "Colombo",
        date: "July",
        image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&q=80&w=800"
    },

    // 4. Social & Charity
    {
        id: "soci-1",
        category: "Social",
        title: "World Blood Donor Day Campaign",
        location: "National Blood Service",
        date: "14 June annually",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/blood%20donation.jpg?w=700&h=441"
    },
    {
        id: "soci-2",
        category: "Social",
        title: "Earth Day Environmental Campaign",
        location: "Nationwide",
        date: "22 April annually",
        image: "https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "soci-3",
        category: "Social",
        title: "Cleaning up around coral reefs",
        location: "Hikkaduwa",
        date: "September",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20cleanup.jpg?w=1024&h=683"
    },
    {
        id: "soci-4",
        category: "Social",
        title: "Beach Cleaning Program",
        location: "Mt. Lavinia Beach",
        date: "Monthly volunteer events",
        image: "https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20clean.jpg?w=500&h=333"
    },
    {
        id: "soci-5",
        category: "Social",
        title: "Tree Planting Program",
        location: "Various districts",
        date: "June–July",
        image: "https://images.unsplash.com/photo-1542601906990-b4d3fb773b09?auto=format&fit=crop&q=80&w=800"
    },

    // 5. Business & Professional
    {
        id: "bus-1",
        category: "Business",
        title: "Cascale Sustainable Apparel Forum",
        location: "Colombo",
        date: "30 May – 1 June 2026",
        image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "bus-2",
        category: "Business",
        title: "Digital Marketing Summit Sri Lanka",
        location: "Colombo",
        date: "June",
        image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "bus-3",
        category: "Business",
        title: "Sri Lanka Economic Summit",
        location: "Shangri-La, Colombo",
        date: "July",
        image: "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "bus-4",
        category: "Business",
        title: "Startup Weekend Colombo",
        location: "Colombo",
        date: "August",
        image: "https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "bus-5",
        category: "Business",
        title: "Enterprise Risk Management Seminar",
        location: "Colombo",
        date: "12 March 2026",
        image: "https://images.unsplash.com/photo-1507679799987-c7377f0c6792?auto=format&fit=crop&q=80&w=800"
    }
];

// Export if using modules, but for vanilla we'll just keep it in global scope if included via script tag
window.eventsData = eventsData;
