<li class="line-content">
    <table class="company-excerpt" cellpadding="0" cellspacing="0" border="0" width="auto">
        <tbody>
        <tr>
            <!--Company description begin-->
            <td class="descr-company d-flex flex-column" style="" colspan="0" border="0">
                <a href="{{ route('company.show',$company->id) }}" class="comp-title" id="">{{ $company->title_company }}</a>
                <div id="company-address" class="company-part">
                    @php
                        $address = $company->adr_title;
                    @endphp

                    @if ($address)
                        <a target="_blank" href="{{ $company->adr_url }}" target="@if(!empty($company->adr_target)){{ $company->adr_target }}@else {{ '_blank' }} @endif ">
                            {{ $address }}
                        </a>
                    @endif
                </div>
                <div id="company-contacts" class="part-block d-flex flex-row">
                    <div class="company-contacts part-block d-flex flex-column">
                        {{ $company->contacts_phone }}
                    </div>
                </div>
                {{--                <div id="company-links" class="part-block">--}}
                {{--                    <?php if (have_rows('links')) : ?>--}}
                {{--                        <?php while (have_rows('links')) : the_row(); ?>--}}
                {{--                        <?php $link = get_sub_field('link') ?>--}}
                {{--                    <a style="word-break: break-all; font-size: 12px" href="<?php echo esc_url($link['url']); ?>" redirect><?php echo esc_html($link['title']); ?>--}}
                {{--                    </a><br>--}}

                {{--                </div>--}}
            </td>
            <!--Company description end-->
            <!--Company excerpt begin-->

            <td class="excerpt-company" colspan="0">

                <div class="entry-thumbnail" style="padding: 0 10px;">
                    @if(!empty($company->thumbnail))
                        <img class="thumb-img" style="visibility: visible;max-width: 150px" width="auto" height="auto" src="{{ asset($company->thumbnail) }}" alt="">

                    @else
                        <img class="thumb-img" width="auto" height="auto" src="{{ asset('/images/none-image.png') }}" alt="none image">
                    @endif
                </div>

            </td>
            <!-- Company description end -->
            <td class="company-shares" style="" colspan="0"></td>
        </tr>
        </tbody>
    </table>
</li>
