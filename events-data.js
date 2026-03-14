const eventsData = [
    // 1. Academic & Educational Events
    {
        id: "acad-1",
        category: "Academic",
        title: "Career Guidence Seminar",
        location: "CG Unit, Ananda College, Colombo 07",
        date: "20 March 2026",
        image: "https://images.unsplash.com/photo-1523050335392-9bef867a0578?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "acad-2",
        category: "Academic",
        title: "Tech-Info Conference",
        location: "SLTC, Padukka",
        date: "25 March 2026",
        image: "https://images.unsplash.com/photo-1536697246787-1f7ad502a472?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "acad-3",
        category: "Academic",
        title: "Coding Hackathon",
        location: "IIT, Colombo",
        date: "25 March 2026",
        image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "acad-4",
        category: "Academic",
        title: "AI & Robotics Workshop",
        location: "Moratuwa University",
        date: "26 March 2026",
        image: "https://images.unsplash.com/photo-1509228468518-180dd482180c?auto=format&fit=crop&q=80&w=800"
    },



    // 2. Cultural & Entertainment Events
    {
        id: "cult-1",
        category: "Cultural",
        title: "Sinhala & Tamil New Year Celebration-Hiru Tv",
        location: "Thambuththegama National Stadium",
        date: "15-04-2026",
        image: "https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-2",
        category: "Cultural",
        title: "Kandy Esala Perahera",
        location: "Queens Hotel-Kandy",
        date: "10-08-2026",
        image: "https://images.unsplash.com/photo-1534441019183-5ec9622d95fc?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "cult-3",
        category: "Cultural",
        title: "Galle Literary Festival",
        location: "Galle Fort",
        date: "15-05-2026",
        image: "https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=800"
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
        date: "30-03-2026",
        image: "https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800"
    },

    {
        id: "cult-8",
        category: "Cultural",
        title: "Hikkaduwa Beach Fest",
        location: "Hikkaduwa",
        date: "April",
        image: "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=800"
    },



    // 3. Sports Events
    {
        id: "spor-1",
        category: "Sports",
        title: "Inter-University Cricket Tournament",
        location: "Rajarata University Of Sri Lanka",
        date: "12-05-2026 ",
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
        location: "Nalanda College,Colombo",
        date: "15-05-2026",
        image: "https://images.unsplash.com/photo-1529692236671-f1f6e946a8b5?auto=format&fit=crop&q=80&w=800"
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
        image: "https://images.unsplash.com/photo-1531415074968-036ba1b575da?auto=format&fit=crop&q=80&w=800"
    },

    {
        id: "spor-9",
        category: "Sports",
        title: "Dialog Schools Rugby League",
        location: "Islandwide schools",
        date: "June–August",
        image: "https://images.unsplash.com/photo-1511941055141-443653146f90?auto=format&fit=crop&q=80&w=800"
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
        image: "https://images.unsplash.com/photo-1615461066841-6116ecaaba30?auto=format&fit=crop&q=80&w=800"
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
        title: "International Coastal Cleanup",
        location: "Negombo & Mt. Lavinia",
        date: "September",
        image: "https://images.unsplash.com/photo-1618477461853-cf6ed80fbaa5?auto=format&fit=crop&q=80&w=800"
    },
    {
        id: "soci-4",
        category: "Social",
        title: "Beach Cleaning Program",
        location: "Mt. Lavinia Beach",
        date: "06-05-2026",
        image: "https://images.unsplash.com/photo-1532187863486-abf9d39d6618?auto=format&fit=crop&q=80&w=800"
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
