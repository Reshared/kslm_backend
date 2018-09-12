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
    @include('kslm.layouts.carousel')

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
                    <h3 class="co-000 text-center about-title">科氏（北京）滤膜科技有限公司</h3>
                    <div class="bg-white padding-30">
                        <div class="text line-height-28">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;科氏（北京）滤膜科技有限公司注册商标为“KOCH”和“科氏”，专注于RO反渗透膜，NF纳滤膜，UF中空超滤膜，卷式超滤 膜，微滤膜等膜制品的研发。能够提供从微滤、超滤、纳滤和反渗透等各种过滤精度的膜产品及系统，膜件结构形式包括中空纤维式、卷式、管式三种。
                        </div>
                        <img class="des-img" src="{{ asset("images/about.png" ) }}" alt="">
                        <div class="text line-height-28">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;科氏滤膜可以广泛应用于废水、工业、民用、饮用水处理、医药、生化技术、食品、乳制品、饮料、电泳涂装 等各个行业。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;科氏滤膜产品广泛应用于以下领域：<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.工业/民用/饮用水－ 市政用水；色素, 杀虫剂和硝酸盐去除；苦咸水和海水脱盐；废水回用处理；发电厂锅炉补给水；饮料和罐装生产；USP 制药用水；化工生产用水；工厂循环水处理。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.高浓废水— 处理回用工业废水, 如食品加工业、印刷出版业、金属重工业、金属加工业、化工生产、运 输业等。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.医药/生化技术— 酶、抗生素浓缩，菌丝体、蛋白质的浓缩，处理细胞溶胞产物、细胞培养液，血液产品提取，疫苗、激素、酵母、维生素的生产或提取，有机酸生产，注射用水去热源等行业应用。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.电泳涂装— 汽车制造、家电和其它工业的阴/阳极电泳涂装，淋洗碱液脱脂，光刻胶的应用，磷化液回用，阳/阴极循环系统，科氏公司拥有全球领先的电泳涂装超滤，在市场有较大的占有率。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.食品、乳制品— 蔗糖澄清，葡萄糖澄清，明胶澄清和浓缩，鸡蛋免疫球蛋白浓缩，淀粉回收，血球蛋白浓缩，醋澄清，乳清蛋白浓缩，牛奶的标准化生产。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.饮料 — 苹果汁、梨汁、菠萝汁等的澄清，葡萄酒澄清，葡萄酒糟回收，橙汁脱苦和澄清，酸果蔓、葡萄汁澄清, 拥有全球85%市场占有率。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.胶乳、颜料、染料和造纸— 纺织行业PVA 回收，回收造纸工艺中涂层材料，粘土浓缩，橡胶乳液浓缩，靛青和其它染料生产，纸浆和造纸的废水回用等。<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;科氏滤膜公司的产品以性能稳定, 抗污染性而著称。 强酸、强碱、溶剂工业废水精细分离------科氏产品可以耐强酸、强碱、溶剂环境，能够帮助广大企业有效管理化学品，水和能源等资源的配置，降低环保处理成本。同时提取回收酸、碱、溶剂、重金属等有价值物质，节约工业生产成本。<br/>
                        </div>
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
                    <h3 class="co-000 text-center about-title">工厂实景图</h3>
                    <img src="{{ asset("images/about-factory.png" ) }}" alt="" class=" mar-30-0">
                </section>

                <section class="list-container clear honor-container hide">
                    <h3 class="text-center about-title">公司荣誉</h3>
                    <ul class="honor-list bg-white">
                        <li class="mar-5 text-center">
                            <img src="{{ asset("images/honor1.png" ) }}" alt="">
                        </li>
                        <li class="mar-5 text-center">
                            <img src="{{ asset("images/honor2.png" ) }}" alt="">
                        </li>
                        <li class=" text-center">
                            <img src="{{ asset("images/honor3.png" ) }}" alt="">
                        </li>
                        <li class="mar-5 text-center">
                            <img src="{{ asset("images/honor4.png" ) }}" alt="">
                        </li>
                        <li class="mar-5 text-center">
                            <img src="{{ asset("images/honor5.png" ) }}" alt="">
                        </li>
                        <li class=" text-center">
                            <img src="{{ asset("images/honor6.png" ) }}" alt="">
                        </li>
                    </ul>
                </section>

                <section class="list-container clear job-container hide">
                    <h3 class="text-center about-title">人员招聘</h3>
                    <div class="job-content bg-white">
                        <img src="{{ asset("images/about-job.png" ) }}" alt="">
                        <div class="item">
                            <div class="title padding-l-20">
                                <span class="co-main mar-r-10px">行政专员/助理</span>
                                <span class="co-red">4000-6000元</span><span class="co-666">/月</span>
                            </div>
                            <div class="text padding-l-20">
                                <div class="line">
                                    <span class="mar-r-20">学历：大专</span>
                                    <span class="mar-r-20">经历：1-3年</span>
                                    <span class="mar-r-20">招聘人数：10人</span>
                                    <span class="mar-r-20">职位类型：行政专员</span>
                                    <span class="mar-r-20">基本要求：年龄不限、性别不限</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">发布时间：2018-08-09</span>
                                    <span class="mar-r-20">有效日期：2010-09-09</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">联系人：王经理</span>
                                    <span class="mar-r-20">联系方式：18734347656</span>
                                    <span class="mar-r-20">邮箱：19823427865@163.com</span>
                                    <span class="mar-r-20">地址：北京市朝阳区建外SOHO</span>
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
                                <div class="line">
                                    <span class="mar-r-20">学历：大专</span>
                                    <span class="mar-r-20">经历：1-3年</span>
                                    <span class="mar-r-20">招聘人数：10人</span>
                                    <span class="mar-r-20">职位类型：行政专员</span>
                                    <span class="mar-r-20">基本要求：年龄不限、性别不限</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">发布时间：2018-08-09</span>
                                    <span class="mar-r-20">有效日期：2010-09-09</span>
                                </div>
                                <div class="line">
                                    <span class="mar-r-20">联系人：王经理</span>
                                    <span class="mar-r-20">联系方式：18734347656</span>
                                    <span class="mar-r-20">邮箱：19823427865@163.com</span>
                                    <span class="mar-r-20">地址：北京市朝阳区建外SOHO</span>
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