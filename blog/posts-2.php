<?php

declare(strict_types=1);

if (!function_exists('cc_blog')) {
    function cc_blog(string $slug, string $group, string $title, string $description, string $html, array $related, string $service, string $serviceLabel): array
    {
        return compact('slug', 'group', 'title', 'description', 'html', 'related', 'service', 'serviceLabel');
    }
}

return [
    cc_blog(
        'data-protection-act-website-ghana',
        'Software',
        'The Data Protection Act and a business website',
        'Systems that process personal data are scoped with Ghana’s Data Protection Act, 2012 (Act 843) in mind. CodeCraft writes that into the quotation rather than treating it as a slogan.',
        '<p>If the site or system stores names, phone numbers, payment references, pupil records, or staff files, the design has to say who can see them. Systems that process personal data are scoped with the Data Protection Act, 2012 (Act 843) in mind.</p>
<h2>What belongs in the scope</h2>
<ul>
<li>What is collected, and why that field is needed.</li>
<li>Who on your team can open a record.</li>
<li>How long you intend to keep it, in plain language you can stand behind.</li>
<li>How a person asks for a correction.</li>
</ul>
<p>A privacy policy page is not a substitute for those decisions. Our own privacy policy describes this website and ProDesk24. Your customers need a policy that matches your business. Copywriting for a page starts at GH₵300 if you want that page written.</p>',
        ['school-management-system-ghana', 'website-security-ghana'],
        '../privacy-policy.html',
        'Read the CodeCraft privacy policy'
    ),
    cc_blog(
        'ai-for-ghana-businesses',
        'Software',
        'AI for everyday work in a Ghanaian business',
        'CodeCraft quotes AI from the brief: a website or WhatsApp assistant, sorting enquiries, or search across your own content. A person still confirms anything that has to be right.',
        '<p>The useful version of AI in a business is narrow. It answers from your pages, products, or member records. It drafts a reply. It flags a step. A person still confirms anything that has to be right. There is no published package price. The quotation follows the channels, the amount of content, and where a human approval is required.</p>
<h2>Jobs we will scope</h2>
<ul>
<li>A website or WhatsApp assistant that answers from your content.</li>
<li>Sorting and drafting for enquiries, invoices, and support.</li>
<li>Search across documents, products, or member records.</li>
</ul>
<p>We do not quote an income figure, and we do not sell a bot that is allowed to invent prices. If the team first needs to learn how to brief this work, the owner course is one weekend, GH₵1,500 in person or GH₵1,000 online.</p>',
        ['whatsapp-business-ghana', 'ai-course-accra'],
        '../services.html#ai',
        'How AI work is priced'
    ),
    cc_blog(
        'whatsapp-business-ghana',
        'Software',
        'WhatsApp follow-up for customer enquiries',
        'A WhatsApp assistant that answers from your own content is quoted from the brief. CodeCraft keeps a person in the loop for anything that has to be right.',
        '<p>Most Ghanaian enquiries already start on WhatsApp. The website’s job is often to catch the people who will not chat first, and to give the chat a page to point at. An assistant on WhatsApp that answers from your content is scoped as AI work, not as a fixed package.</p>
<h2>What the brief must include</h2>
<p>The questions you are willing to answer automatically, the questions that must reach a person, and the documents the assistant may use. Prices, delivery areas, and refunds should be copied from a source you control. The assistant should not invent them.</p>
<h2>The page still needs to exist</h2>
<p>A starter website is GH₵2,000 if there is nowhere for the chat to send a serious buyer. Tracking so you can see which page led to the chat is GH₵750 when that setup is separate.</p>',
        ['ai-for-ghana-businesses', 'landing-page-ghana'],
        '../services.html#ai',
        'AI and assistant pricing'
    ),
    cc_blog(
        'how-to-choose-a-web-developer-in-ghana',
        'Studio',
        'How to choose a web developer in Ghana',
        'Ask for a written scope, a price in cedis, and work you can open. CodeCraft publishes starting prices and builds from GM-108 Adam Street, Accra.',
        '<p>Choose a studio you can check. Open live sites. Ask who will do the work. Ask for the price in Ghana cedis, what is excluded, and what happens after launch. A quote that cannot say those things is not ready to accept.</p>
<h2>What we put in writing</h2>
<p>Starting prices are on the Services page. A starter site is GH₵2,000. Prices exclude tax. The first call is free for up to 30 minutes. Nothing starts until the deposit has cleared. On full payment you own the final content, branding, and data, and you receive a licence to use the site. Source-code ownership can be transferred on request and is quoted per project.</p>
<h2>What a portfolio is for</h2>
<p>Open the live site, including AGI Ghana and the shops in the portfolio. A screenshot with no address is weaker evidence than a page you can load on your phone.</p>',
        ['web-design-accra', 'free-website-consultation-ghana'],
        '../portfolio.html',
        'Open the portfolio'
    ),
    cc_blog(
        'how-long-to-build-a-website-ghana',
        'Studio',
        'How long does a website take in Ghana?',
        'A standard business website is often a few weeks once content is in. Custom systems are quoted. A manufacturing system is typically 8 to 16 weeks. A management suite is typically 3 to 6 months.',
        '<p>A business website commonly takes a few weeks from kick-off once the content is available. More complex shops and platforms take longer because products, payments, and roles take decisions, not because the calendar is padded. The quotation states the timeline for your scope.</p>
<h2>Published ranges for systems</h2>
<ul>
<li>A CRM is about 4 to 8 weeks.</li>
<li>A manufacturing system is typically 8 to 16 weeks.</li>
<li>A business management suite is typically 3 to 6 months.</li>
</ul>
<p>Your delay moves the date. Send content within 7 days of the deposit, and feedback within 5 business days of each review. A rush, meaning delivery in less than half the usual time, is a premium of 25 to 50 percent, and only if we have capacity.</p>',
        ['website-deposit-ghana', 'website-cost-in-ghana'],
        '../contact.html',
        'Ask for a timeline with the quote'
    ),
    cc_blog(
        'website-deposit-ghana',
        'Studio',
        'How website deposits work',
        'Up to GH₵5,000, CodeCraft takes 70 percent before work and 30 percent before handover. Larger bands are 60/30/10 and 50/30/20. Nothing starts until the deposit clears.',
        '<p>Up to GH₵5,000 the split is 70 percent deposit and 30 percent before handover. From GH₵5,001 to GH₵15,000 it is 60 percent, then 30 percent at a milestone, then 10 percent before handover. From GH₵15,001 to GH₵50,000 it is 50 percent, 30 percent, and 20 percent. Above GH₵50,000 the milestones are written into the contract.</p>
<h2>What the deposit means</h2>
<p>Nothing starts until it has cleared. Handover waits until the agreed balance is paid. If you cancel after work has started, the deposit covers reserved time and work already done, and committed third-party costs are still payable.</p>
<h2>How long the quote lasts</h2>
<p>Standard package quotations are valid for 30 days. Custom work and retainers are valid for 14 days. Prices exclude tax unless the quotation says otherwise.</p>',
        ['how-long-to-build-a-website-ghana', 'free-website-consultation-ghana'],
        '../services.html#commercial',
        'Payment and scope terms'
    ),
    cc_blog(
        'prodesk24-for-ghana-smes',
        'Software',
        'When ProDesk24 fits a Ghanaian business',
        'ProDesk24 onboarding, setup, and team training start at GH₵1,000. The subscription is billed on the ProDesk24 plan. A process that does not fit is quoted as custom software.',
        '<p>ProDesk24 is the product we use when customer records, invoicing, tasks, and a support desk fit one system. Setup, onboarding, and team training start at GH₵1,000. The subscription is billed on the ProDesk24 plan, not inside that fee. Prices for our work exclude tax.</p>
<h2>Use it when</h2>
<p>The team needs one place for the customer, the invoice, and the next task, and the product’s shape matches that work. You can try the product at prodesk24.com and then ask us to set it up.</p>
<h2>Do not force it when</h2>
<p>Production, a multi-branch stock rule, or a public membership directory needs a different shape. Those are custom systems, with published floors from GH₵10,000 for multi-location inventory and GH₵25,000 for advanced enterprise software. The owner course uses ProDesk24 in the room while following one item from stock to the sale. The course is not a substitute for the setup.</p>',
        ['crm-software-ghana', 'business-automation-ghana'],
        '../products.html#prodesk24',
        'ProDesk24 on the products page'
    ),
    cc_blog(
        'business-automation-ghana',
        'Software',
        'Automating one repeated business process',
        'Workflow automation at CodeCraft starts at GH₵2,500 per workflow. A reporting dashboard starts at GH₵3,000. Prices exclude tax.',
        '<p>Start with one process you repeat every week: a stock count, a quotation, a delivery note, an approval. Workflow automation and process improvement starts at GH₵2,500 per workflow. A reporting dashboard starts at GH₵3,000. Prices exclude tax.</p>
<h2>A workflow is not a new company</h2>
<p>If the records already live in ProDesk24 or another platform, configuration on an existing platform starts at GH₵5,200. Data import starts at GH₵500, by volume. An API that has to talk to another system starts at GH₵2,000.</p>
<h2>Where AI fits</h2>
<p>AI can draft or flag a step. A person still decides. That part is quoted from the brief. The owner weekend at the studio is the short version of this lesson: one path from production or inventory to the sale, priced at GH₵1,500 in person or GH₵1,000 online.</p>',
        ['prodesk24-for-ghana-smes', 'api-integration-ghana'],
        '../services.html#automation',
        'Automation prices'
    ),
    cc_blog(
        'manufacturing-software-ghana',
        'Software',
        'Software from production to the sale',
        'A manufacturing and production system from CodeCraft is GH₵15,000 to GH₵60,000 and typically takes 8 to 16 weeks. Prices exclude tax.',
        '<p>A maker is not only a shop. Materials come in, work happens, finished goods go out, and a sale should match what left the floor. A manufacturing and production system is GH₵15,000 to GH₵60,000. The published timeline is 8 to 16 weeks. Prices exclude tax.</p>
<h2>What moves the price inside that range</h2>
<p>Sites, the number of steps in production, whether inventory is multi-location, the reports management already uses, and any mobile app. A mobile application on its own starts at GH₵25,000. Multi-location inventory starts at GH₵10,000 if that is the whole job.</p>
<h2>Discovery</h2>
<p>This size starts with technical discovery from GH₵1,000, credited in full if you proceed within 30 days. Bring the spreadsheet you use today. The quote is wrong if that sheet stays hidden until week six.</p>',
        ['inventory-system-ghana', 'erp-software-ghana'],
        '../services.html#software',
        'Manufacturing system prices'
    ),
    cc_blog(
        'hr-payroll-system-ghana',
        'Software',
        'HR and payroll systems',
        'An HR and payroll system from CodeCraft starts at GH₵12,000, excluding tax. It is quoted after we see headcount, sites, and what must stay confidential.',
        '<p>HR and payroll starts at GH₵12,000, excluding tax. The figure moves with headcount, how many locations employ people, and which reports finance already expects. It is not a spreadsheet with a login pasted on top unless that is truly all you need.</p>
<h2>Treat the data as sensitive</h2>
<p>Salaries and personal files are scoped with the Data Protection Act, 2012 (Act 843) in mind. The quotation should name who can see pay, and how a leaver’s access is removed.</p>
<h2>Training is part of the system</h2>
<p>Custom systems include team training and a user guide, plus three months of post-launch support. If you also want a classroom day for a wider team, staff training is GH₵1,000 for a half day and GH₵1,800 for a full day.</p>',
        ['data-protection-act-website-ghana', 'it-training-accra'],
        '../services.html#software',
        'HR system starting price'
    ),
    cc_blog(
        'mobile-app-cost-ghana',
        'Software',
        'What a mobile app costs in Ghana',
        'A mobile application from CodeCraft starts at GH₵25,000, excluding tax. Many businesses need a website or a portal first, from GH₵2,000 or GH₵10,000.',
        '<p>A mobile application starts at GH₵25,000, excluding tax. The quote follows the stores you must ship to, the accounts, and whether the app is the product or a window onto a system you already have.</p>
<h2>Build the site first when</h2>
<p>Customers need to read, buy, or book, and a phone browser is enough. A starter website or store is GH₵2,000. A booking website is GH₵6,000. A portal with logins starts at GH₵10,000. An app is the right spend when the phone itself must do something a browser will not: a camera workflow, offline capture, or a store listing you have decided is worth the upkeep.</p>
<h2>After launch</h2>
<p>Store accounts, review delays, and updates when a phone vendor changes the rules are part of the real cost. Yearly support on a custom build is about 15% of the build price if you want that cover. It is optional and quoted.</p>',
        ['custom-software-cost-ghana', 'booking-website-ghana'],
        '../services.html#software',
        'App and software prices'
    ),
    cc_blog(
        'erp-software-ghana',
        'Software',
        'When a Ghanaian business needs an ERP suite',
        'A business management suite from CodeCraft starts at GH₵40,000 and typically takes 3 to 6 months. Above GH₵50,000, payment milestones are written into the contract.',
        '<p>An ERP, in plain language, is one system for the records several departments already keep apart: stock, sales, finance, and the people who approve them. A business management suite starts at GH₵40,000. The published timeline is 3 to 6 months. Prices exclude tax.</p>
<h2>Do the smaller system first when</h2>
<p>Only one of those records hurts. Inventory from GH₵10,000, a CRM from GH₵8,000, or ProDesk24 onboarding from GH₵1,000 may be the whole job. A suite is justified when the same item must be visible to production, the store, and the invoice without a weekly export.</p>
<h2>How a project of this size is paid</h2>
<p>From GH₵15,001 to GH₵50,000 the split is 50 percent, then 30 percent, then 20 percent before handover. Above GH₵50,000 the milestones are in the contract. Discovery from GH₵1,000 is credited if you proceed within 30 days.</p>',
        ['manufacturing-software-ghana', 'enterprise-software-ghana'],
        '../enterprise.html',
        'Enterprise starting figures'
    ),
    cc_blog(
        'hospitality-website-ghana',
        'Websites',
        'Hotel, restaurant, and travel websites',
        'Hospitality sites need a booking or an enquiry a guest can send. A booking website is GH₵6,000. A custom reservation system starts at GH₵12,000.',
        '<p>A guest should see the offer and send a booking or an enquiry without calling first. A booking or appointment website, with scheduling, confirmations, and reminders, is GH₵6,000. A fuller reservation system starts at GH₵12,000. Prices exclude tax.</p>
<h2>Restaurants and travel firms</h2>
<p>A menu or a trip list can start as a website from GH₵2,000 if the action is an enquiry or a simple order path. Online payment, if the guest pays on the page, is a gateway from GH₵2,000 when it is not already included. Photos are yours to supply unless a content line is in the quote.</p>
<h2>What we will not invent</h2>
<p>Room counts, occupancy, and “best hotel” claims do not belong in the build. The page should state what you actually sell and the area you serve.</p>',
        ['booking-website-ghana', 'food-business-website-ghana'],
        '../industries.html#hospitality',
        'Hospitality on the industries page'
    ),
    cc_blog(
        'food-business-website-ghana',
        'Websites',
        'Websites for food businesses in Ghana',
        'A food business can start with a site or store from GH₵2,000. Orders that must track stock and branches are a system, from GH₵10,000 for multi-location inventory.',
        '<p>A menu, a grocery list, or an order a customer can finish on a phone can start as a website or starter store at GH₵2,000. A premium store, if the catalogue is the business, is GH₵8,500. Prices exclude tax.</p>
<h2>When the shop outgrows the site</h2>
<p>Several kitchens, a warehouse, or riders change the job. Multi-location inventory starts at GH₵10,000. A POS on an existing platform starts at GH₵5,200. Mobile money at checkout is a gateway from GH₵2,000 if the package does not already include it.</p>
<h2>Live examples</h2>
<p>Food and retail sites in the portfolio, including Pepper Dem, can be opened from the portfolio page. Use them to see the kind of public site, then brief your own menu and delivery area. We do not copy another brand’s offer onto your quote.</p>',
        ['online-store-ghana', 'hospitality-website-ghana'],
        '../industries.html#food',
        'Food on the industries page'
    ),
    cc_blog(
        'agribusiness-website-ghana',
        'Websites',
        'Websites for farms and processors',
        'An agribusiness site from CodeCraft starts at GH₵2,000 when buyers need a clear company page. Export-ready product catalogues and buyer enquiries are scoped from the pages and languages you need.',
        '<p>Farms, processors, and the buyers they supply usually need a company page that states the product, the season, and how to start an order. A starter website is GH₵2,000. A business website is GH₵4,500 if the range, the sites, and the proof need more pages. Prices exclude tax.</p>
<h2>A catalogue is not yet a commodity exchange</h2>
<p>Extra pages are GH₵200. Product copy is from GH₵300 a page if we write it. If buyers must log in, see prices by account, or place repeated orders against stock, that is a portal from GH₵10,000 or an inventory system from GH₵10,000, not a brochure with a password.</p>
<h2>Export buyers</h2>
<p>If the reader is outside Ghana, say so. The page should make the product, the pack, and the next email obvious. An export-focused company site is still priced from the same website table unless a portal or a language set changes the scope.</p>',
        ['export-website-ghana', 'website-cost-in-ghana'],
        '../industries.html#agri',
        'Agri-business on the industries page'
    ),
    cc_blog(
        'export-website-ghana',
        'Websites',
        'Websites for Ghanaian exporters',
        'An exporter’s site has to present the product and let a buyer abroad start the conversation. Starter and business websites are GH₵2,000 and GH₵4,500, excluding tax.',
        '<p>A buyer in another country will not call a Ghana number as the first step. The site has to show the product and offer a form or an email that reaches a person who can answer. A starter site is GH₵2,000. A business website is GH₵4,500. Prices exclude tax. Year-one domain, SSL, and hosting are included on those packages.</p>
<h2>What to put on the page</h2>
<ul>
<li>The product, the pack, and what you do not ship.</li>
<li>A way to ask for a specification or a sample.</li>
<li>Proof you are allowed to show: photos, certificates you hold, and named clients only with permission.</li>
</ul>
<p>A company profile designed for that buyer meeting is GH₵1,500 if you want the print piece as well. We do not invent export volumes.</p>',
        ['agribusiness-website-ghana', 'corporate-website-ghana'],
        '../industries.html#export',
        'Export on the industries page'
    ),
    cc_blog(
        'association-website-ghana',
        'Websites',
        'Websites for associations in Ghana',
        'A membership or directory site starts at GH₵8,000. CodeCraft built the AGI Ghana platform, which you can open at agighana.org. Prices exclude tax.',
        '<p>An association site fails when members cannot find a notice, a form, or their own listing. A membership or directory website, with accounts, listings, search, and filters, starts at GH₵8,000. A custom portal with roles and workflows starts at GH₵10,000. Prices exclude tax.</p>
<h2>Work you can open</h2>
<p>The Association of Ghana Industries platform is live at agighana.org. The IB/IGB programme site is live at ib-igb.agighana.org. Those are public sites. They are not a template we paste onto the next association. Your sections, your fees, and your approval steps are the brief.</p>
<h2>Member payments</h2>
<p>If dues are collected on the site, gateway work starts at GH₵2,000 when it is not already in the package. The provider’s fee stays with the association.</p>',
        ['membership-website-ghana', 'enterprise-software-ghana'],
        '../enterprise.html',
        'Read the enterprise page'
    ),
    cc_blog(
        'enterprise-software-ghana',
        'Software',
        'Advanced enterprise software in Ghana',
        'Advanced enterprise software from CodeCraft starts at GH₵25,000. A management suite starts at GH₵40,000. Both are quoted after discovery. Prices exclude tax.',
        '<p>Advanced enterprise software starts at GH₵25,000. A business management suite starts at GH₵40,000. Prices exclude tax. These are floors. The quotation follows users, branches, integrations, and the data you already have.</p>
<h2>Who this is for</h2>
<p>An association, a manufacturer, a group with branches, or a firm that needs accounts and a shared record. A five-page company site is still a website, from GH₵2,000. Do not buy a suite because the word sounds larger than the problem.</p>
<h2>How it starts</h2>
<p>The first call is free for up to 30 minutes. Systems at this size start with technical discovery from GH₵1,000, credited if you proceed within 30 days. From GH₵15,001 to GH₵50,000 the payment split is 50 percent, 30 percent, and 20 percent. Above GH₵50,000 the milestones are in the contract.</p>',
        ['erp-software-ghana', 'association-website-ghana'],
        '../enterprise.html',
        'The enterprise page'
    ),
    cc_blog(
        'small-business-website-package-ghana',
        'Websites',
        'Small-business website packages in Ghana',
        'CodeCraft packages start at GH₵5,250 for a business presence. A starter site on its own is GH₵2,000. Prices exclude tax.',
        '<p>If you want the site and the first brand and social pieces together, read the packages. They start at GH₵5,250. If you only need the site, the starter is GH₵2,000 and the business website is GH₵4,500. Prices exclude tax.</p>
<h2>What people mix up</h2>
<p>A package is a bundle with named parts. It is not “everything digital”. Advertising spend, printing, and a ProDesk24 subscription are outside unless the quotation lists them. ProDesk24 onboarding on its own starts at GH₵1,000. A starter logo added to a website package starts at GH₵500.</p>
<h2>A practical order</h2>
<p>Site first, so there is a page to send people to. Profile and a few social templates next, if you will actually post. Ads only after the page can take the enquiry. Meta ads setup is GH₵750, and the ad budget is yours.</p>',
        ['website-cost-in-ghana', 'logo-design-cost-ghana'],
        '../services.html#packages',
        'See the packages'
    ),
    cc_blog(
        'website-security-ghana',
        'Websites',
        'Website security for a small business',
        'A website security and performance audit at CodeCraft is GH₵750. Care plans that include updates and monitoring start at GH₵250 a month.',
        '<p>A security and performance audit is GH₵750. It is a look at the site you already have: updates, obvious holes, and whether the page is slow enough to lose a buyer. Prices exclude tax. An audit is a report and a list of work, not a promise that nothing can ever go wrong.</p>
<h2>Staying current</h2>
<p>Care plans include backups, core and plugin updates, and monitoring. They start at GH₵250 a month. The plan states the hours and the response time. Extra hours are quoted before the work starts.</p>
<h2>Logins and customer data</h2>
<p>A shop or a portal needs a clearer scope than a brochure. Say who can export the customer list. Systems that process personal data are scoped with the Data Protection Act, 2012 (Act 843) in mind. SSL on a new starter or business website is part of the included first year.</p>',
        ['website-maintenance-ghana', 'data-protection-act-website-ghana'],
        '../services.html#websites',
        'Audit and website prices'
    ),
    cc_blog(
        'website-copywriting-ghana',
        'Websites',
        'Who writes the words on the website?',
        'Content writing at CodeCraft starts at GH₵300 a page. If you write it, send it within 7 days of the deposit. Prices exclude tax.',
        '<p>Content writing and copywriting starts at GH₵300 a page. A company profile, written and designed, is GH₵1,500. Prices exclude tax. If the quote says you supply the words, send them within 7 days of the deposit. A late draft moves the delivery date by the same amount.</p>
<h2>What to hand over</h2>
<ul>
<li>The services you actually sell, and the ones you have stopped.</li>
<li>Prices you are willing to publish.</li>
<li>Proof: photos, names, and claims you can stand behind.</li>
</ul>
<p>We will not invent ratings, headcount, or a revenue number to make a page sound larger. A starter site can launch with your own sentences. A page that must persuade a buyer who does not know you is the one worth paying to write.</p>',
        ['website-cost-in-ghana', 'corporate-website-ghana'],
        '../services.html#websites',
        'Content and website add-ons'
    ),
    cc_blog(
        'it-training-accra',
        'Studio',
        'IT training and support in Accra',
        'Staff training at CodeCraft is GH₵1,000 for a half day and GH₵1,800 for a full day. Technical consultation is GH₵300 an hour. The first call is free for up to 30 minutes.',
        '<p>Staff training is GH₵1,000 for a half day and GH₵1,800 for a full day. Technical consultation is GH₵300 an hour. On-site support is from GH₵400 a visit, plus transport, and the visit is confirmed before anyone travels. Prices exclude tax.</p>
<h2>Office IT around the training</h2>
<ul>
<li>Workstation configuration: GH₵200 each.</li>
<li>Business email setup: GH₵300.</li>
<li>Small office network: from GH₵1,500, after a site survey.</li>
<li>A business software assessment: from GH₵1,500.</li>
</ul>
<p>SME digital transformation consulting is GH₵2,000 a day, for a 7-hour day. Training that belongs to a custom system is already included in that system’s handover. A classroom day for a wider team is the separate price above.</p>',
        ['hr-payroll-system-ghana', 'ai-course-accra'],
        '../services.html#consulting',
        'Training and IT prices'
    ),
    cc_blog(
        'ai-course-accra',
        'Studio',
        'AI courses at the Accra studio',
        'Students and youth train for up to six weeks at GH₵500 a week in person, with four seats, or GH₵1,000 online. Business owners spend one weekend at GH₵1,500 in person or GH₵1,000 online.',
        '<p>The courses are short and practical. Students, and youth or people already in IT, train for up to six weeks. In person is GH₵500 a week, with four seats. Online is GH₵1,000 once, and online seats are not capped. Prices exclude tax.</p>
<h2>Business owners</h2>
<p>Owners spend one weekend on using AI and a system to follow work from production or inventory to the sale. ProDesk24 is the system in the room. In person is GH₵1,500, paid at the front desk, with four seats. Online is GH₵1,000, paid with Paystack.</p>
<h2>After school</h2>
<p>Students who finish can intern with CodeCraft, and CodeCraft accepts National Service personnel after school. That is company acceptance. It is not a government posting. A free introduction is separate from the paid seat. If the four in-person seats for the week or weekend are full, the next period is the option. A waitlist does not hold a seat.</p>',
        ['ai-for-ghana-businesses', 'it-training-accra'],
        '../mentorship.html',
        'See the three courses'
    ),
    cc_blog(
        'free-website-consultation-ghana',
        'Studio',
        'What happens on the free first call',
        'The first call with CodeCraft is free for up to 30 minutes, and remote wherever possible. It is a scoping conversation, not a build.',
        '<p>The first call is free for up to 30 minutes. It is remote wherever possible. Use it to say what the business sells, what the website or system must do, and what you already tried. You leave with a recommendation: a package, a scoped quotation, or a discovery session.</p>
<h2>What the call is not</h2>
<p>It is not a design presentation and it is not on-site. An on-site visit is from GH₵400 plus transport, confirmed before anyone travels. Systems under GH₵15,000 can include a free discovery session of up to two hours. Larger or complex systems start with paid technical discovery from GH₵1,000, credited if you proceed within 30 days.</p>
<h2>How to reach the studio</h2>
<p>GM-108 Adam Street, Accra. hello@codecraftgh.com. +233 549 739 010. You can also book from the Resources page. Bring an example of a site you like and one you do not, and any price you must not cross.</p>',
        ['how-to-choose-a-web-developer-in-ghana', 'website-deposit-ghana'],
        '../resources.html?tab=booking',
        'Book the call'
    ),
    cc_blog(
        'multi-vendor-ecommerce-ghana',
        'Websites',
        'Multi-vendor and advanced online stores',
        'Advanced e-commerce, including multi-vendor checkout or a link to stock software, starts at GH₵12,000. A single-brand starter store is GH₵2,000.',
        '<p>A shop with one owner and one catalogue can start at GH₵2,000, or GH₵8,500 for the premium store. A market, a mall of sellers, or a checkout tied to stock software is advanced e-commerce, from GH₵12,000. Prices exclude tax and the job is quoted after discovery.</p>
<h2>Decide this before the quote</h2>
<ul>
<li>Who owns the customer: you, or each seller?</li>
<li>Who receives the money, and when a seller is paid?</li>
<li>Who is responsible when a product does not arrive?</li>
</ul>
<p>Those answers change the build more than the colour of the homepage. A payment gateway that is not already included starts at GH₵2,000. Provider fees stay with the business that is actually taking the payment.</p>',
        ['ecommerce-cost-ghana', 'payment-gateway-ghana'],
        '../services.html#websites',
        'Advanced store pricing'
    ),
    cc_blog(
        'api-integration-ghana',
        'Software',
        'API integration for Ghanaian businesses',
        'API integration at CodeCraft starts at GH₵2,000. It covers a named connection, such as payments, SMS, or accounting, and it is quoted from that connection.',
        '<p>An API integration starts at GH₵2,000. The price is for a named connection: a payment provider, an SMS sender, an accounting export, or another system you already use. Prices exclude tax. “Integrate everything” is not a scope.</p>
<h2>What we need from you</h2>
<p>Access to a test account, a person at the other company if their side must approve the connection, and one example of a record that should move. A successful test, not a diagram, is the point of the work.</p>
<h2>SMS and payments</h2>
<p>If the message is a booking confirmation or a payment receipt, say who sends it and who pays for the messages. Payment-provider fees and SMS credit are not part of the GH₵2,000. A workflow around that connection, if the process itself must change, starts at GH₵2,500 per workflow.</p>',
        ['payment-gateway-ghana', 'business-automation-ghana'],
        '../services.html#software',
        'API integration price'
    ),
];
