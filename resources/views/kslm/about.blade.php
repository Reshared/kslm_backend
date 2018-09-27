@extends('kslm.layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@section('js')
    @parent
    <script src="{{ asset('js/conf.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        $(function () {
            // tab切换
            $('ul.tab').find('li').on('click', function () {
                $('ul.tab').find('li').removeClass('active')
                $('.container').find('.list-container').removeClass('show active').addClass('hide');

                var blockClass = $(this).attr('data-container');
                $(this).addClass('active');
                $(blockClass).addClass('show').removeClass('hide');
            })

            $('.container .honor-container').find('.honor-list li').on('click', function () {
                var imgSrc = $(this).find('img').attr('src');
                $('#explodedViewModal').find('img').attr({src: imgSrc});
                $('#explodedViewModal').modal('show');
            })
        })
    </script>
@stop

@section('body')
    <article class="about">
        <!-- 头部 -->
    @include('kslm.layouts.header')
    <!-- 导航 -->
    @include('kslm.layouts.nav')
    <!-- 轮播图 -->
    @include('kslm.layouts.image')

    <!-- 主要内容 -->
        <main>
            <!-- tab切换 -->
            <ul class="tab bg-white tab">
                <li class="active animation-line" data-container=".company-container">公司简介</li>
                <li class="animation-line" data-container=".honor-container">荣誉资质</li>
                <li class="animation-line" data-container=".factory-container">工厂实景图</li>
                <li class="animation-line" data-container=".job-container">人员招聘</li>
            </ul>
            <div class="container">
                <!-- 内容块 -->
                <section class="list-container clear company-container show">
                    <h3 class="co-000 text-center about-title">{{ $introduce->title }}</h3>
                    <div class="bg-white padding-30">
                        {!! $introduce->content !!}
                    </div>

                    <ul class="bottom-list">
                        <li class="text-center mar-5">
                            <img src="{{ asset("images/about1.png" ) }}" alt="">
                            <div class="text">性能稳定</div>
                        </li>
                        <li class="text-center mar-5">
                            <img src="{{ asset("images/about2.png" ) }}" alt="">
                            <div class="text">节约环保</div>
                        </li>
                        <li class="text-center">
                            <img src="{{ asset("images/about3.png" ) }}" alt="">
                            <div class="text">降低成本</div>
                        </li>
                    </ul>
                </section>

                <section class="list-container clear factory-container hide">
                    <h3 class="co-000 text-center about-title lm-title">{{ $image->title }}</h3>
                    {!! $image->content !!}
                </section>

                <section class="list-container clear honor-container hide">
                    <h3 class="text-center about-title">公司荣誉</h3>
                    <ul class="honor-list bg-white">
                        @foreach($honors as $honor)
                        <li class="text-center">
                            <img src="{{ $honor->image }}" alt="{{ $honor->name }}">
                        </li>
                        @endforeach
                    </ul>
                </section>

                <section class="list-container clear job-container hide">
                    <h3 class="text-center about-title lm-title">人员招聘</h3>
                    <div class="job-content bg-white">
                        <img src="./images/about-job.png" alt="">
                        <div class="item">
                            <div class="title padding-l-20">
                                <span class="co-main mar-r-10px">行政专员/助理</span>
                                <span class="co-red">4000-6000元</span><span class="co-666">/月</span>
                            </div>
                            <div class="text padding-l-20">
                                <div class="line lm-mb">
                                    <span class="mar-r-20">学历：大专</span>
                                    <span class="mar-r-20">经历：1-3年</span>
                                    <span class="mar-r-20">招聘人数：10人</span>
                                    <br class="lm-show">
                                    <span class="mar-r-20">职位类型：行政专员</span>
                                    <span class="">基本要求：年龄不限、性别不限</span>
                                </div>
                                <div class="line lm-mb">
                                    <span class="mar-r-20">发布时间：2018-08-09</span>
                                    <span class="mar-r-20">有效日期：2010-09-09</span>
                                </div>
                                <div class="line lm-mb">
                                    <span class="mar-r-20">联系人：王经理</span>
                                    <span class="mar-r-20">联系方式：18734347656</span>
                                    <span class="mar-r-20 lm-block">邮箱：19823427865@163.com</span>
                                    <span class="mar-r-20 lm-block">地址：北京市朝阳区建外SOHO</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">岗位职责：</span>
                                </div>
                                <div class="co-666 line">
                                    1、制定并完善采购部门的流程和规章制度；<br/>
                                    2、组织采购人员制定年度、季度、月度采购计划并执行；负责采购进度控制，进行采购交期管理；<br/>
                                    3、参与关键产品采购业务的洽谈工作，审核大宗采购合同，监督合同的执行和落实情况；<br/>
                                    4、设定并及时调整系统产品相关采购信息，采购周期，安全存量，及建议补量等；<br/>
                                    5、负责采购成本控制，积极寻求降低采购成本的方法；<br/>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">任职要求：</span>
                                </div>
                                <div class="co-666 line">
                                    1、6年以上采购工作经验，电子行业优先，3年以上采购管理经验；<br/>
                                    2、熟悉企业采购管理流程，运作模式及特点；<br/>
                                    3、通晓成本控制的方法与手段，成本控制意识强烈；<br/>
                                    4、英文听说读写能力优异；<br/>
                                    5、具有优秀的谈判能力、管理能力、判断和决策能力、人际沟通协调能力及良好的目标计划能力；并具备较强的战略实施能力。<br/>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="title padding-l-20">
                                <span class="co-main mar-r-10px">会计</span>
                                <span class="co-red">4000-6000元</span><span class="co-666">/月</span>
                            </div>
                            <div class="text padding-l-20">
                                <div class="line lm-mb">
                                    <span class="mar-r-20">学历：大专</span>
                                    <span class="mar-r-20">经历：1-3年</span>
                                    <span class="mar-r-20">招聘人数：10人</span>
                                    <br class="lm-show">
                                    <span class="mar-r-20">职位类型：行政专员</span>
                                    <span class="">基本要求：年龄不限、性别不限</span>
                                </div>
                                <div class="line lm-mb">
                                    <span class="mar-r-20">发布时间：2018-08-09</span>
                                    <span class="mar-r-20">有效日期：2010-09-09</span>
                                </div>
                                <div class="line lm-mb">
                                    <span class="mar-r-20">联系人：王经理</span>
                                    <span class="mar-r-20">联系方式：18734347656</span>
                                    <span class="mar-r-20 lm-block">邮箱：19823427865@163.com</span>
                                    <span class="mar-r-20 lm-block">地址：北京市朝阳区建外SOHO</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">岗位职责：</span>
                                </div>
                                <div class="co-666 line">
                                    1、制定并完善采购部门的流程和规章制度；<br/>
                                    2、组织采购人员制定年度、季度、月度采购计划并执行；负责采购进度控制，进行采购交期管理；<br/>
                                    3、参与关键产品采购业务的洽谈工作，审核大宗采购合同，监督合同的执行和落实情况；<br/>
                                    4、设定并及时调整系统产品相关采购信息，采购周期，安全存量，及建议补量等；<br/>
                                    5、负责采购成本控制，积极寻求降低采购成本的方法；<br/>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">任职要求：</span>
                                </div>
                                <div class="co-666 line">
                                    1、6年以上采购工作经验，电子行业优先，3年以上采购管理经验；<br/>
                                    2、熟悉企业采购管理流程，运作模式及特点；<br/>
                                    3、通晓成本控制的方法与手段，成本控制意识强烈；<br/>
                                    4、英文听说读写能力优异；<br/>
                                    5、具有优秀的谈判能力、管理能力、判断和决策能力、人际沟通协调能力及良好的目标计划能力；并具备较强的战略实施能力。<br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- 图片展示框 -->
    <div class="modal fade exploded-view" tabindex="-1" role="dialog" id="explodedViewModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body pos-re">
            <span class="pos-ab close-icon" data-dismiss="modal" aria-label="Close"></span>
            <img src="./images/honor1.png" alt="">
          </div>
        </div>
      </div>
    </div>
        <!-- 浮窗 -->
    @include('kslm.layouts.window')
    <!-- 在线留言 -->
    @include('kslm.layouts.message')
    <!-- 底部 -->
        @include('kslm.layouts.footer')
    </article>
@stop