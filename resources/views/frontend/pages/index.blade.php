@extends('layouts.frontendapp')

@section('content')
<div class="banner_area">
  <div class="container pt-2">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-12 col-12">
        <div class="lefttxt_banner">
          <h1>BUILD TARGETED EMAIL LISTS IN SECONDS</h1>
          <div><i style="font-size:14px" class="fa">&#xf0c8;<span>Affordable</span></i><i style="font-size:14px" class="fa font_awosm">&#xf0c8;<span>Accurate</span></i><i style="font-size:14px" class="fa font_awosm">&#xf0c8;<span>Guaranteed</span></i></div>
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-play" style="font-size:16px"></i>1 Minute Overvew</button>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;">
                    <source src="https://archive.org/download/WebmVp8Vorbis/webmvp8_512kb.mp4" type="video/mp4">
                    Your browser doesn't support HTML5 video tag. </video>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12 col-12">
        <div class="righttxt_banner">
          <p>Find sales leads with the #1 site for accurate business-to-
            business (B2B) email lists. Get the varified contact information
            of those in your target industry with Pickyourdata.com.
            It’s never been easier to buy an email llist of good information
            thatwill help you make real connections! Zero in on your target
            audience and email leads with these databases to make more
            deals and boost your sales. Right now, you can buy mailing
            liststhat have been pre-made or create you own marketing
            solution with our innovative online list builder tool.
            Start finding new business contacts online now!</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="banner_area_second">
  <div class="container pt-2">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="second_logo"> <img src="{{asset('images/logo_secnd.png')}}" alt=""/> </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="righttxt_banner">
          <p>At Pickyourdata.com, we're all about bringing the right people
            together, so whether you need to pull a business, executive, or
            physician email list, wehave the quality information you need.
            Buy sales leads and potential contacts that are right for your business
            so that you can master your next direct marketing campaign.
            We provide our clients with premium data, including email addresses,
            phone numbers, postal addresses, and much more. Offering quality,
            human-verified contact lists to download minutes after you buy is our
            business. Clients benefit from our CRM-ready data product that's
            full of direct information you need to start emailing, calling, or mailing
            potential leads. Contact lists for sale are available by job, department,
            andindustry, allowing you to target the important decision-makers your
            business needs!</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="righttxt_banner">
          <p>We guarantee accurate and up-to-date, premium contacts in our business
            mailing lists. We have developed the world's most innovative real-time online
            list-builder tool using our very own data intelligence algorithms and qualified
            data sources. Enjoy the safety and security of our proprietary tool. With just a
            few easy steps, you'll have targeted email lists ready to be fed into your
            computer systems and CRM software. One product can serve multiple
            functions: You can use the file as a mailing list, an email database, and a
            simple directory of highly qualified business professionals in any industry.
            Buying direct marketing information from Bookyourdata.com is simple. You'll
            get an all-in-one, premium database full of targeted sales leads that can be
            marketed to right away by phone or computer. Get started now to connect
            with real businesses today! — CEO, Gary Taylor</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="second_banner_button">
          <button type="button" class="btn">Request A Consultation</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tweleve_icons">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/badge_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>95% Deliverability Guarantee</h2>
            <p>If more than 5% of our emails bounce
              back, we'll provide credits for more data.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/prem_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>Premium Full Contacts</h2>
            <p>Contact from every angle by email, phone, postal
              address, and much more. Don’t miss your chance
              to make a connection.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/search_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>Search, Order, Download!</h2>
            <p>Within minutes, you can download a
              database of contacts and start connecting
              with your audience.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/international_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>International Product Range</h2>
            <p>IConnect with high-level managers at companies in
              the US, UK, Canada, Europe, Asia, and more.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/crm_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>CRM Ready Files</h2>
            <p>Download your list as a .csv file, integrate it
              into your CRM, and start networking.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/affortable_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>Affordable Pricing</h2>
            <p>Quality email lists enable businesses to make B2B
              connections for an amazingly low price.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/unmatch_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>Unmatched Accuracy</h2>
            <p>Both automated and manual processes ensure
              the accuracy of our human-verified lists.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="icon_text">
          <div class="left_cion"><img src="{{asset('images/direct_icon.png')}}" alt=""/> </div>
          <div class="right_text">
            <h2>Direct Contacts Only</h2>
            <p>Don't bother contacting generics (such as contact@).
              With our lists, you can email real people.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="using_email">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="email_for_sale">
		  <h1>USING EMAIL FOR SALES PROSPECTING</h1>
			<p>Think like your audience, earn their trust, and convert them to customers</p>
			<div class="">
          <button type="button" class="btn">Download E-Book</button>
        </div>
		  </div>
	  </div>
    </div>
  </div>
</div>
<div class="closing_new">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="email_for_sale">
		  <h1>CLOSING NEW DEALS IS TOUGH, RIGHT?</h1>
			<p>Bookyourdata.com gives you the information you need to reach decision-makers <br>
in your target market, so you can connect directly with the right people to close more deals.</p>
			<div class="">
          <button type="button" class="btn">Build Your Prospect List Now</button>
        </div>
		  </div>
	  </div>
    </div>
  </div>
</div>
<div class="ready_made">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
		<div class="ready_made_list">
		  <h1>READY-MADE LISTS</h1>
			<p>Build your list with our list-builder tool, or buy one
of our pre-built contact lists of managers and stakeholders
in several industries. Market to your target audience,
whether it's doctors or CFOs. We have more than 100 lists
to choose from!</p>
		  </div>
	  </div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-12">
		<div class="hospital">
		  <h1>Hospitals <span>147,309 Contacts</span></h1>
		  </div>
			<div class="hospital">
		  <h1>CEO <span>147,309 Contacts</span></h1>
		  </div>
			<div class="hospital">
		  <h1>CFO <span>147,309 Contacts</span></h1>
		  </div>
	  </div>
    </div>
  </div>
</div>
<div class="ready_to_bost">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-12">
		<div class="ready_made_list">
		  <h1>READY TO BOOST YOUR SALES LIKE YOUR COMPETITORS?
TRY OUR TOOL FOR FREE. </h1>
		  </div>
	  </div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
		<div class="bulid_list_btn">
          <button type="button" class="btn">Build A List<span>&#8594;</span></button>
        </div>
	  </div>
    </div>
  </div>
</div>
@endsection
