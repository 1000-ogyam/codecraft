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
        'website-cost-in-ghana',
        'Websites',
        'How much does a website cost in Ghana?',
        'A starter website or online store at CodeCraft in Accra is GH₵2,000. A business website is GH₵4,500. Prices are in cedis and exclude tax.',
        '<p>A starter website or starter online store from Codecraft Technologies is GH₵2,000. A business website is GH₵4,500. A premium store is GH₵8,500. Those figures are starting prices in Ghana cedis and exclude tax. Year-one domain, SSL, and hosting are included on the starter and business website.</p>
<h2>What sits around that price</h2>
<p>An extra page is GH₵200. A landing page is GH₵2,000. A booking or appointment website is GH₵6,000. A professional corporate website is GH₵7,000. A membership or directory site starts at GH₵8,000, and a custom portal starts at GH₵10,000.</p>
<h2>What moves the quote</h2>
<p>Pages, how custom the design is, payments such as mobile money or Paystack, who writes the content, languages, user roles, and how fast you need it. Payment-provider fees are paid by the business and are not part of the build price. Work starts after a written quote and a cleared deposit.</p>',
        ['web-design-accra', 'business-website-vs-starter'],
        '../services.html#websites',
        'See the website price list'
    ),
    cc_blog(
        'web-design-accra',
        'Websites',
        'Web design in Accra: what you actually get',
        'CodeCraft designs and builds websites from the Accra studio at GM-108 Adam Street. A starter site is GH₵2,000. The first call is free for up to 30 minutes.',
        '<p>Web design in Accra, from this studio, means a page a customer can open on a phone, a way to enquire, and a price written down before anyone starts. The studio is at GM-108 Adam Street. The first call is free for up to 30 minutes.</p>
<h2>A normal business site</h2>
<p>The starter is GH₵2,000. The business website is GH₵4,500 and includes more room for the company, the work, and the proof. Both include the first year of domain, SSL, and hosting. Prices exclude tax.</p>
<h2>Design is not a separate surprise invoice</h2>
<p>The quotation states the pages and the revision rounds. A starter includes two revision rounds. A business website includes three. Extra pages, integrations, or revision rounds are written up before that work starts. If you only need a logo, that is a branding job, from GH₵1,000 on its own.</p>',
        ['website-cost-in-ghana', 'how-to-choose-a-web-developer-in-ghana'],
        '../contact.html',
        'Book the free call'
    ),
    cc_blog(
        'online-store-ghana',
        'Websites',
        'How to open an online store in Ghana',
        'A starter online store from CodeCraft is GH₵2,000. A premium store is GH₵8,500. Checkout can include mobile money or Paystack when the quote says so.',
        '<p>An online store in Ghana starts as a catalogue a customer can browse on a phone, with a checkout you have agreed in writing. At CodeCraft the starter online store is GH₵2,000. The premium store is GH₵8,500. Prices exclude tax.</p>
<h2>What to decide before the build</h2>
<ul>
<li>Who delivers, and which cities you actually serve.</li>
<li>Whether the customer pays online, on delivery, or both.</li>
<li>Who writes the product names, prices, and photos.</li>
<li>Whether stock is counted in the store or in another system.</li>
</ul>
<h2>Payments</h2>
<p>A gateway that is not already in the package starts at GH₵2,000. The provider’s own fees stay with the business. A store that also needs multi-vendor checkout or a link to stock software is an advanced e-commerce build, from GH₵12,000.</p>',
        ['ecommerce-cost-ghana', 'mobile-money-website-ghana'],
        '../services.html#websites',
        'Store packages and prices'
    ),
    cc_blog(
        'mobile-money-website-ghana',
        'Websites',
        'Taking Mobile Money on a Ghanaian website',
        'Mobile money on a CodeCraft website is scoped as a payment gateway, from GH₵2,000 when it is not already in the package. Provider fees are separate.',
        '<p>Customers in Ghana often expect to pay from a phone wallet. On a website that means a named method, such as MTN MoMo or another wallet, wired to checkout or to an invoice. It is not automatic on every starter site.</p>
<h2>What we quote</h2>
<p>Payment gateway or API work that is not already inside the package starts at GH₵2,000. The quotation names the methods. The wallet or gateway company charges its own fee. That fee is not part of the build price.</p>
<h2>What to have ready</h2>
<p>A business account with the provider, the name that should appear to the customer, and a person who can confirm a test payment. We do not turn on live payments until that test has gone through and the balance of the project is agreed.</p>',
        ['paystack-ghana', 'payment-gateway-ghana'],
        '../services.html#websites',
        'Website and payment prices'
    ),
    cc_blog(
        'paystack-ghana',
        'Websites',
        'Paystack on a website in Ghana',
        'CodeCraft can add Paystack to a site or store. Gateway work starts at GH₵2,000 when it is not already in the package. Prices exclude tax.',
        '<p>Paystack lets a customer pay by card, mobile money, or bank, and sends the result back to the site. It is a fit when you want one checkout instead of asking people to send a screenshot of a transfer.</p>
<h2>The build and the provider are different bills</h2>
<p>Our integration starts at GH₵2,000 if the package does not already include it. Paystack’s own charges are between you and Paystack. The quotation separates those two things.</p>
<h2>Where it shows up in our own work</h2>
<p>The owner course online seat is GH₵1,000 and is paid with Paystack. An invoice on the Resources page can also start a Paystack payment. A client store uses the same idea: the amount, the reference, and a confirmation before the order is treated as paid.</p>',
        ['mobile-money-website-ghana', 'payment-gateway-ghana'],
        '../services.html#websites',
        'See gateway pricing'
    ),
    cc_blog(
        'business-website-vs-starter',
        'Websites',
        'Starter website or business website?',
        'The starter website is GH₵2,000. The business website is GH₵4,500. Both include year-one domain, SSL, and hosting. Prices exclude tax.',
        '<p>Choose the starter at GH₵2,000 when you need a clear public page, a way to be contacted, and the first year of domain, SSL, and hosting. Choose the business website at GH₵4,500 when the company needs more pages for services, proof, and a fuller content setup.</p>
<h2>Revisions and support</h2>
<p>A starter includes two revision rounds. A business website includes three. Included support after handover is 30 days on a starter and 3 months on a business website. That support covers defects in the agreed scope, not a new feature.</p>
<h2>When neither is enough</h2>
<p>A corporate site of about 15 pages is GH₵7,000. A membership site starts at GH₵8,000. If people must log in and follow a process, look at a portal, from GH₵10,000, rather than stretching a brochure site.</p>',
        ['website-cost-in-ghana', 'corporate-website-ghana'],
        '../services.html#websites',
        'Compare the packages'
    ),
    cc_blog(
        'ecommerce-cost-ghana',
        'Websites',
        'What an online store costs in Ghana',
        'Starter online stores at CodeCraft are GH₵2,000. A premium store is GH₵8,500. Advanced commerce, including multi-vendor checkout, starts at GH₵12,000.',
        '<p>The public starting prices are simple. A starter online store is GH₵2,000. A premium store is GH₵8,500. Prices exclude tax. Extra products beyond the package limit are GH₵5 each.</p>
<h2>Premium is a larger shop, not a different company</h2>
<p>The premium store is the one to read when you expect many products, customer accounts, and a shop you will run every week. If several sellers must each have a stall, or checkout must talk to stock software, that is advanced e-commerce, from GH₵12,000, and it is quoted after the brief.</p>
<h2>Costs that are not the build</h2>
<p>Delivery, packaging, the payment provider’s fee, and the advertising budget are yours. Care plans, if you want the shop looked after after launch, start at GH₵250 a month.</p>',
        ['online-store-ghana', 'premium-online-store-ghana'],
        '../services.html#websites',
        'Store prices'
    ),
    cc_blog(
        'premium-online-store-ghana',
        'Websites',
        'What a premium online store includes',
        'The premium store at CodeCraft is GH₵8,500, excluding tax. It is for a shop that needs accounts, a larger catalogue, and a proper admin.',
        '<p>GH₵8,500 is the published price of the premium store. It is the package for a business that will live in the shop, not a one-page catalogue. Prices exclude tax.</p>
<h2>Read the package against your shop</h2>
<p>Use the Services page for the line items in that package, then tell us where your shop is different. Common differences are a payment method, a stock file that must be imported, and more products than the package includes. Extra products are GH₵5 each. A gateway that is not already included starts at GH₵2,000.</p>
<h2>After it opens</h2>
<p>Included support on a premium store is 6 months for defects in the agreed scope, security updates, how-to guidance, and minor content edits of up to 2 hours a month. New features are quoted on their own. Ongoing care plans start at GH₵250 a month.</p>',
        ['ecommerce-cost-ghana', 'website-maintenance-ghana'],
        '../services.html#websites',
        'Read the store packages'
    ),
    cc_blog(
        'custom-software-cost-ghana',
        'Software',
        'Custom software prices in Ghana',
        'CodeCraft quotes custom systems after discovery. A POS on an existing platform starts at GH₵5,200. Advanced enterprise software starts at GH₵25,000. Prices exclude tax.',
        '<p>Custom software is priced from the job, not from a single package. Published floors in cedis, excluding tax: POS setup on an existing platform from GH₵5,200. A custom POS and inventory build is GH₵7,000 to GH₵25,000. A CRM is GH₵8,000 to GH₵30,000. A custom business web application starts at GH₵15,000. Advanced enterprise software starts at GH₵25,000. A management suite starts at GH₵40,000.</p>
<h2>What every custom system includes</h2>
<p>Discovery, a working demo before go-live, team training, and a user guide, plus three months of post-launch support. Hosting for a custom system is billed separately, at cost. Optional yearly support is about 15% of the build price and covers defect fixes, security updates, and small improvements.</p>
<h2>Discovery</h2>
<p>Systems under GH₵15,000 include a free discovery session of up to two hours. Systems of GH₵15,000 and above start with paid technical discovery from GH₵1,000. That fee is credited in full if you proceed within 30 days.</p>',
        ['pos-system-ghana', 'enterprise-software-ghana'],
        '../services.html#software',
        'The software price table'
    ),
    cc_blog(
        'pos-system-ghana',
        'Software',
        'POS systems for shops in Ghana',
        'A POS on an existing platform starts at GH₵5,200. A custom POS and inventory build is GH₵7,000 to GH₵25,000. CodeCraft quotes it in cedis, excluding tax.',
        '<p>A point of sale is the screen where a sale is recorded and the stock number moves. If a known platform already does that, implementation starts at GH₵5,200. If the counter, the store, and the rules are specific to you, a custom POS and inventory build is GH₵7,000 to GH₵25,000.</p>
<h2>What changes the number</h2>
<p>Branches, products, barcode or no barcode, whether mobile money is taken at the counter, and whether yesterday’s sales must be imported. Data import starts at GH₵500, by volume. A payment API starts at GH₵2,000.</p>
<h2>ProDesk24</h2>
<p>If the records you need already fit ProDesk24, onboarding and team training start at GH₵1,000. The ProDesk24 subscription is billed on its own plan. A counter process that does not fit is scoped as custom software.</p>',
        ['inventory-system-ghana', 'prodesk24-for-ghana-smes'],
        '../services.html#software',
        'POS and inventory prices'
    ),
    cc_blog(
        'inventory-system-ghana',
        'Software',
        'Inventory systems for more than one location',
        'Multi-location inventory at CodeCraft starts at GH₵10,000. A manufacturing system is GH₵15,000 to GH₵60,000. Prices exclude tax.',
        '<p>One storeroom and a notebook can survive. Two shops, a warehouse, and a person who sells on WhatsApp usually cannot. Multi-location inventory starts at GH₵10,000. Prices exclude tax and are quoted after we see how stock actually moves.</p>
<h2>What we need to see</h2>
<ul>
<li>Where stock enters, and who is allowed to change a count.</li>
<li>Whether a sale in one place must reduce stock in another.</li>
<li>The spreadsheet or system you use today, and how clean it is.</li>
</ul>
<p>Data import starts at GH₵500, by volume. A manufacturing and production system, where the item is made and not only resold, is GH₵15,000 to GH₵60,000 and typically takes 8 to 16 weeks.</p>',
        ['pos-system-ghana', 'manufacturing-software-ghana'],
        '../services.html#software',
        'System starting prices'
    ),
    cc_blog(
        'crm-software-ghana',
        'Software',
        'CRM for a Ghanaian sales team',
        'A CRM from CodeCraft is GH₵8,000 to GH₵30,000, excluding tax. ProDesk24 onboarding starts at GH₵1,000 when that product fits.',
        '<p>A CRM is the list of people you might sell to, what was promised, and who speaks to them next. A custom CRM is GH₵8,000 to GH₵30,000. The range moves with users, pipelines, and what must be imported from WhatsApp notes and spreadsheets.</p>
<h2>When a product is enough</h2>
<p>ProDesk24 includes customer records. Setup, onboarding, and team training start at GH₵1,000. The subscription is billed on the ProDesk24 plan, not inside that onboarding fee.</p>
<h2>When it is custom</h2>
<p>Custom work is the right path when the stages, the approvals, or the reports are specific. Timeline for a CRM in the published table is about 4 to 8 weeks. Systems from GH₵15,000 start with technical discovery from GH₵1,000, credited if you proceed within 30 days.</p>',
        ['prodesk24-for-ghana-smes', 'custom-software-cost-ghana'],
        '../services.html#software',
        'CRM and software prices'
    ),
    cc_blog(
        'school-management-system-ghana',
        'Software',
        'School management systems in Ghana',
        'A school management system from CodeCraft starts at GH₵15,000, excluding tax. It is quoted after discovery because fees, classes, and records differ by school.',
        '<p>A school system has to hold students, classes, fees, and the people allowed to see each record. The published starting price is GH₵15,000, excluding tax. The real figure follows the number of campuses, how fees are taken, and whether parents must log in.</p>
<h2>Why discovery is paid at this size</h2>
<p>Systems of GH₵15,000 and above start with technical discovery from GH₵1,000. That fee is credited in full if the school proceeds within 30 days. The session is where fee rules, report cards, and who may edit a record get written down.</p>
<h2>Personal data</h2>
<p>A school holds personal data. The build is scoped with the Data Protection Act, 2012 (Act 843) in mind. The quotation should say who can see a pupil’s record, and how a parent asks for a correction.</p>',
        ['data-protection-act-website-ghana', 'custom-software-cost-ghana'],
        '../services.html#software',
        'Software starting prices'
    ),
    cc_blog(
        'booking-website-ghana',
        'Websites',
        'Booking and appointment websites in Ghana',
        'A booking or appointment website is GH₵6,000. A custom booking system starts at GH₵12,000. Prices at CodeCraft exclude tax.',
        '<p>There are two different jobs. A booking website, with online scheduling, confirmations, and reminders, is GH₵6,000. A booking and reservation system with rooms, resources, or staff rules starts at GH₵12,000. Prices exclude tax.</p>
<h2>Pick the smaller one when</h2>
<p>One location, one calendar, and a customer who chooses a time and leaves a name. Reminders can be part of that website quote. A payment at the time of booking is a gateway, from GH₵2,000 if it is not already included.</p>
<h2>Pick the system when</h2>
<p>Several staff, several rooms, deposits, or a rule that Tuesday afternoons are blocked. That is software, with discovery, a demo, training, and a user guide. The timeline is quoted, not guessed on a sales call.</p>',
        ['hospitality-website-ghana', 'website-cost-in-ghana'],
        '../services.html#websites',
        'Booking website price'
    ),
    cc_blog(
        'website-maintenance-ghana',
        'Websites',
        'Website maintenance cost in Ghana',
        'Website care at CodeCraft starts at GH₵250 a month. Plans run from Lite to Advanced, with a stated number of included hours and a response time.',
        '<p>Care plans start at GH₵250 a month. Lite is from GH₵250 and includes 1 hour, with a response within 2 business days. Basic is GH₵500, with 2 hours and a response within 1 business day. Standard is GH₵800, with 4 hours and a response within 8 business hours. Advanced is GH₵1,500, with 8 hours and a response within 4 business hours.</p>
<h2>What the hours are for</h2>
<p>Backups, updates, monitoring, and small content changes up to the hours in the plan. Extra hours are quoted before that work starts. A new page or a new payment method is not “maintenance”. An extra page on a website is GH₵200. A new feature on a custom system is quoted on its own.</p>
<h2>Custom systems</h2>
<p>Yearly support for a custom system is about 15% of the original build price. It covers defect fixes, security updates, and small improvements. Renewals for domain and hosting are billed at least 30 days before expiry.</p>',
        ['website-security-ghana', 'premium-online-store-ghana'],
        '../services.html#maintenance',
        'Maintenance plans'
    ),
    cc_blog(
        'seo-ghana',
        'Marketing',
        'SEO for a business website in Ghana',
        'SEO setup at CodeCraft is GH₵1,500. Monthly SEO management is GH₵1,500 a month. Prices exclude tax. Rankings are not promised.',
        '<p>Search engines can show your pages when the pages are clear, fast enough, and about a real offer. SEO setup and optimisation is GH₵1,500. Monthly SEO management is GH₵1,500 a month. Prices exclude tax.</p>
<h2>What the work is</h2>
<p>Titles, descriptions, the structure of the pages, and the basics that help Google read the site. A content package, if you also need pages written, starts at GH₵300 a page, and a monthly content package is GH₵2,000. We do not sell a promise of a number-one ranking.</p>
<h2>A site that cannot be found for a local search</h2>
<p>Start with Google Business Profile setup at GH₵400 if the goal is “near me” and a map pin, then decide whether the website itself needs the GH₵1,500 setup. Advertising is a different budget. Ads management starts at GH₵1,000 a month, and the ad spend is yours.</p>',
        ['google-business-profile-ghana', 'website-cost-in-ghana'],
        '../services.html#marketing',
        'Marketing prices'
    ),
    cc_blog(
        'social-media-management-ghana',
        'Marketing',
        'Social media management prices in Ghana',
        'Social account setup at CodeCraft is GH₵500. Management is GH₵1,500 a month. A content bundle of designs is GH₵600. Advertising spend is separate.',
        '<p>Setup of the accounts is GH₵500. Ongoing social media management is GH₵1,500 a month. A social media design bundle is GH₵600. Prices exclude tax. Retainers run for a minimum of three months, are billed monthly in advance, and include a performance report.</p>
<h2>What you should see in the quote</h2>
<p>How many posts, designs, and reports. “We will handle social media” without a count is not a scope. A standard content creation package is GH₵1,000. A monthly content package is GH₵2,000.</p>
<h2>Ads are not the management fee</h2>
<p>Meta ads setup is GH₵750. Ads management is GH₵1,000 a month. The money paid to Meta is your advertising budget and is never folded into the management fee.</p>',
        ['meta-ads-ghana', 'logo-design-cost-ghana'],
        '../services.html#marketing',
        'Marketing price list'
    ),
    cc_blog(
        'logo-design-cost-ghana',
        'Marketing',
        'Logo design cost in Ghana',
        'A stand-alone logo from CodeCraft is GH₵1,000. A complete brand identity is GH₵2,000. A starter logo added to a website package starts at GH₵500.',
        '<p>A stand-alone logo is GH₵1,000. A complete brand identity, with logo, colours, typography, and usage guidelines, is GH₵2,000. If you are already buying a website, a starter logo and brand kit added to that package starts at GH₵500, with limited concepts and revisions. Prices exclude tax.</p>
<h2>Nearby design work</h2>
<ul>
<li>Flyer or promotional design: GH₵150.</li>
<li>Roll-up banner: GH₵400.</li>
<li>Corporate stationery: GH₵800.</li>
<li>Company profile writing and design: GH₵1,500.</li>
</ul>
<p>Printing, photography, and stock assets are separate. The quotation says how many concepts and revision rounds you get. Extra rounds are approved before that work starts.</p>',
        ['social-media-management-ghana', 'small-business-website-package-ghana'],
        '../services.html#branding',
        'Branding prices'
    ),
    cc_blog(
        'domain-hosting-ghana',
        'Websites',
        'Domain, SSL, and hosting for a new website',
        'Year-one domain, SSL, and hosting are included on CodeCraft starter and business websites. Later renewals are billed at least 30 days before expiry.',
        '<p>On a starter website, a starter store, and a business website, the first year of the domain, SSL, and hosting is included in the published price. You should not see a second invoice for those three items in year one unless the quotation says the name or the plan is outside that inclusion.</p>
<h2>Year two</h2>
<p>Domain and hosting renewals are billed at least 30 days before expiry. Website renewals in the published range are GH₵400 to GH₵800 a year, depending on the plan. Custom-system hosting is billed at cost, separately from the build.</p>
<h2>Email</h2>
<p>Business email setup on its own is GH₵300. It can be added to a website. The mailbox host’s own fee, if there is one, is stated on the quote.</p>',
        ['website-cost-in-ghana', 'website-maintenance-ghana'],
        '../services.html#websites',
        'What the website packages include'
    ),
    cc_blog(
        'google-business-profile-ghana',
        'Marketing',
        'Google Business Profile for an Accra business',
        'Google Business Profile setup at CodeCraft is GH₵400. It is the map listing, separate from building the website. Prices exclude tax.',
        '<p>When someone searches for a business near them, the map listing often appears before the website. Setup and local visibility for a Google Business Profile is GH₵400, excluding tax.</p>
<h2>What you provide</h2>
<p>The legal or trading name, the address you want shown, the phone number, the hours, and photos you have the right to use. We do not invent reviews. If a rating is mentioned anywhere in our own material, it is the rating Google actually shows.</p>
<h2>The website still matters</h2>
<p>The profile can point at the site. The site is a separate job, from GH₵2,000 for a starter. SEO setup, if you want the pages themselves prepared for search, is GH₵1,500. The profile does not replace either of those.</p>',
        ['seo-ghana', 'web-design-accra'],
        '../services.html#marketing',
        'Local marketing prices'
    ),
    cc_blog(
        'meta-ads-ghana',
        'Marketing',
        'Meta ads for a business in Ghana',
        'Meta ads setup at CodeCraft is GH₵750. Managing the ads is GH₵1,000 a month. The money spent on ads is yours, not part of the fee.',
        '<p>Setup of a Meta ads campaign is GH₵750. Ongoing ads management is GH₵1,000 a month. Conversion tracking and reporting setup is GH₵750 if that measurement is not already in place. Prices exclude tax.</p>
<h2>Three amounts, not one</h2>
<ul>
<li>Our setup or management fee.</li>
<li>The budget you pay to Meta.</li>
<li>The page or shop the ad opens, if you do not already have one.</li>
</ul>
<p>A lead-generation landing page starts at GH₵2,500. A starter website is GH₵2,000. Sending ads to a page that cannot take the enquiry wastes the ad budget. Retainers run for at least three months and include a performance report. We do not promise a sales figure.</p>',
        ['social-media-management-ghana', 'landing-page-ghana'],
        '../services.html#marketing',
        'Ads and marketing prices'
    ),
    cc_blog(
        'landing-page-ghana',
        'Websites',
        'When a landing page is enough',
        'A landing page from CodeCraft is GH₵2,000. A lead-generation landing page starts at GH₵2,500. Use one page when there is one offer and one action.',
        '<p>A landing page is one conversion-focused page, with a form and tracking, at GH₵2,000. A lead-generation landing page starts at GH₵2,500. Prices exclude tax. It is the right shape when you have one offer, one audience, and one thing you want the visitor to do.</p>
<h2>When it is the wrong shape</h2>
<p>A company that must explain several services, show work, and recruit needs a website. The business website is GH₵4,500. A shop needs a store, from GH₵2,000 for the starter, not a single page with a phone number.</p>
<h2>Ads and the page</h2>
<p>If the page exists only to receive ads, say so in the brief. Tracking setup is GH₵750. The ad budget remains yours. The page price does not include a month of ads.</p>',
        ['meta-ads-ghana', 'website-cost-in-ghana'],
        '../services.html#websites',
        'Landing page price'
    ),
    cc_blog(
        'website-redesign-ghana',
        'Websites',
        'When to redesign a website',
        'A website redesign at CodeCraft starts at GH₵2,500, priced on pages, complexity, and whether the old content must move. Prices exclude tax.',
        '<p>Redesign starts at GH₵2,500. The figure moves with the number of pages, how custom the new design is, and the content that has to come across from the old site. Prices exclude tax.</p>
<h2>Redesign when</h2>
<ul>
<li>People cannot complete the one action that pays you, on a phone.</li>
<li>The pages no longer match the offer.</li>
<li>You are about to run ads or a new shop on top of a site that cannot hold them.</li>
</ul>
<h2>Do not redesign when</h2>
<p>The only problem is a dead link, an old phone number, or a plugin that needs an update. That can be care, from GH₵250 a month, or a quoted hour. A new website is GH₵2,000 and up when the structure itself is wrong, not when one line of text is wrong.</p>',
        ['website-cost-in-ghana', 'website-maintenance-ghana'],
        '../services.html#websites',
        'Redesign and website prices'
    ),
    cc_blog(
        'corporate-website-ghana',
        'Websites',
        'A professional corporate website in Ghana',
        'A professional corporate website from CodeCraft is GH₵7,000. An institutional site starts at GH₵15,000. Prices exclude tax.',
        '<p>The professional corporate website is GH₵7,000. It is aimed at a company that needs a custom design, about 15 pages, a way for staff to update content, and SEO foundations. Prices exclude tax.</p>
<h2>Larger than a company brochure</h2>
<p>An institutional or custom-theme site starts at GH₵15,000. That is 25 or more pages, a theme built for that organisation, structured content, and a formal handover, quoted after discovery. A membership or directory site, with accounts and search, starts at GH₵8,000.</p>
<h2>The public site and the internal system</h2>
<p>The corporate site explains the organisation. A portal where staff or members log in and complete a process starts at GH₵10,000. Quote them separately if both are needed, so the brochure work does not get buried inside a software project.</p>',
        ['membership-website-ghana', 'enterprise-software-ghana'],
        '../services.html#websites',
        'Corporate and institutional prices'
    ),
    cc_blog(
        'membership-website-ghana',
        'Websites',
        'Membership and directory websites',
        'A membership or directory website starts at GH₵8,000. A custom portal, with roles and workflows, starts at GH₵10,000. Prices exclude tax.',
        '<p>Associations, professional bodies, and directories need accounts, listings, search, and filters. That website starts at GH₵8,000, excluding tax. It is more than a page of names.</p>
<h2>What to list in the brief</h2>
<ul>
<li>Who may register, and who approves a profile.</li>
<li>What the public can see without logging in.</li>
<li>Whether members pay a fee on the site.</li>
</ul>
<p>A fee payment is a gateway, from GH₵2,000 if it is not already in the package. If joining sets off a process with several roles, that is a custom portal, from GH₵10,000. The AGI Ghana platform is an example of member and communications work you can open today. We do not publish private member counts as a marketing claim.</p>',
        ['association-website-ghana', 'corporate-website-ghana'],
        '../enterprise.html',
        'Enterprise and member platforms'
    ),
    cc_blog(
        'payment-gateway-ghana',
        'Websites',
        'Payment gateway integration in Ghana',
        'A payment gateway or API that is not already in the package starts at GH₵2,000. CodeCraft names the method in the quote. Provider fees are separate.',
        '<p>Gateway and API work starts at GH₵2,000 when the package does not already include it. The quote names the method: mobile money, Paystack, bank, or another provider you already have an account with. Prices exclude tax.</p>
<h2>What “integrated” means</h2>
<p>The customer can start a payment, the site can tell a successful payment from a failed one, and a person on your side can find the reference. A button that only opens a dialler is not a gateway.</p>
<h2>What we will not fold in</h2>
<p>The provider’s percentage, any settlement delay, and the customer’s own network. Those stay outside the build price. Test payments happen before go-live. Handover of a payment project waits until the agreed balance of our invoice is paid.</p>',
        ['paystack-ghana', 'mobile-money-website-ghana'],
        '../services.html#websites',
        'Gateway price'
    ),
];
